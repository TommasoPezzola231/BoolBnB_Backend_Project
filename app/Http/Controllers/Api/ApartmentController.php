<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

        /*controllo per la validità dei dati numerici di $address
        query che calcola la distanza tra una posizione geografica di riferimento e le posizioni nel database*/
        if (is_numeric($address['latitude']) && is_numeric($address['longitude'])) {
            $query->select(DB::raw("*,
                (6371 * acos(cos(radians({$address['latitude']})) * cos(radians(latitude)) *
                cos(radians(longitude) - radians({$address['longitude']})) +
                sin(radians({$address['latitude']})) * sin(radians(latitude))))
                AS distance"))
                ->having('distance', '<', $radius);
        }

        $apartments = $query->get();

        return response()->json(['apartments' => $apartments]);
    }
}
