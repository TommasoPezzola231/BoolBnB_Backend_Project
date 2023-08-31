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

        return response()->json($apartments);
        
    }









    public function searchPlus(Request $request)
    {
        $city = $request->input('city');
        
        if ($city) {
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

            $apartments = Apartment::whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude]);
        }

        $city = $request->input('city');
        if ($city) {
            $apartments = Apartment::where('city', '=', $request->input('city'));
        }


        $numRooms = $request->input('num_rooms');
        if ($numRooms) {
            $apartments = Apartment::where('num_rooms', '>=', $request->input('num_rooms'));
        }


        $numBathrooms = $request->input('num_bathrooms');
        if ($numBathrooms) {
            $apartments = Apartment::where('num_bathrooms', '>=', $request->input('num_bathrooms'));
        }


        $squareMeters = $request->input('square_meters');
        if ($squareMeters) {
            $apartments = Apartment::where('square_meters', '>=', $request->input('square_meters'));
        }


        $price = $request->input('price');
        if ($price) {
            $apartments = Apartment::where('price', '>=', $request->input('price'));
        }


        $selectedServices = $request->input('serviceID', []);
        if ($selectedServices) {
            $apartments = Apartment::whereHas('services', function ($query) use ($selectedServices) {
                $query->whereIn('name', $selectedServices);
            });
        }



        // Filtra gli appartamenti
       /* $apartments = Apartment::whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude])
            ->where('city', 'LIKE', '%' . $city . '%')
            ->where('num_rooms', '<=', $numRooms)
            ->where('num_bathrooms', '<=', $numBathrooms)
            ->where('square_meters', '<=', $squareMeters)
            ->where('price', '<=', $price)
            ->whereHas('services', function ($query) use ($selectedServices) {
                $query->whereIn('name', $selectedServices);
            })
            ->get();*/

        return response()->json($apartments->get());
    }
}
