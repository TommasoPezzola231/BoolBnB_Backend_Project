<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with("services")->paginate(10);

        $response = [
            "success" => true,
            "apartments" => $apartments,
        ];

        return response()->json($response);

        //return view('admin.apartments.index', compact('apartments'));
    }

    public function search(Request $request)
    {
        $city = $request->input('city');

        $url = 'https://api.tomtom.com/search/2/geocode/' . urlencode($city) . '.json';
        $apiKey = 'U6BQ1DicdzYIkj5nrK4823OxJuCY6gyP';

        $response = Http::get($url, [
            'key' => $apiKey
        ]);

        // $response = Http::get($url, [
        //     'key' => 'U6BQ1DicdzYIkj5nrK4823OxJuCY6gyP' //env('KEY_TOMTOM')
        // ]);

        $data_api = $response->json();

        $latitudine = $data_api['results'][0]['position']['lat'];
        $longitudine = $data_api['results'][0]['position']['lon'];

        $cityCoordinates = ['latitude' => $latitudine, 'longitude' => $longitudine];

        // Calcola le coordinate dei limiti del rettangolo (approssimato)
        $minLatitude = $cityCoordinates['latitude'] - 0.18; // Approssimazione per 20 km
        $maxLatitude = $cityCoordinates['latitude'] + 0.18;
        $minLongitude = $cityCoordinates['longitude'] - 0.18;
        $maxLongitude = $cityCoordinates['longitude'] + 0.18;

        // Filtra gli appartamenti
        $apartments = Apartment::whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude])
            ->get();

        return response()->json(['apartments' => $apartments]);
        
    }

    public function searchPlus(Request $request)
    {
        $radius = $request->input('radius', 20); // Raggio di default di 20 km

        $query = Apartment::query();

        // Filtri di ricerca
        if ($request->has('num_rooms')) {
            $query->where('num_rooms', '>=', $request->input('num_rooms'));
        }

        if ($request->has('num_bathrooms')) {
            $query->where('num_bathrooms', '>=', $request->input('num_bathrooms'));
        }

        if ($request->has('serviceID')) {
            $service = $request->input('serviceID');
            $query->whereHas('services', function ($q) use ($service) {
                $q->where('name_service', $service);
            });
        }

        // Geolocalizzazione
        $address = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ];
        //controllo per la validità dei dati numerici di $address
        //query che calcola la distanza tra una posizione geografica di riferimento e le posizioni nel database
        if (is_numeric($address['latitude']) && is_numeric($address['longitude'])) {
            $query->select(DB::raw(",
                (6371 acos(cos(radians({$address['latitude']})) * cos(radians(latitude)) *
                cos(radians(longitude) - radians({$address['longitude']})) +
                sin(radians({$address['latitude']})) * sin(radians(latitude))))
                AS distance"))
                ->having('distance', '<', $radius);
        }

        $serviceName = 'name_service';
        $apartmentIdService = DB::table('apartment_service')
            ->join('services', 'apartment_service.service_id', '=', 'services.id')
            ->where('services.name_service', $serviceName)
            ->pluck('apartment_service.apartment_id'); //ottengo elenco ID appartamento dalla tabella pivot

        $query->whereIn('id', $apartmentIdService); //filtro gli appartamenti nella query principale (aparment::query)

        $apartments = $query->get();

        return response()->json(['apartments' => $apartments]);
    }
}
