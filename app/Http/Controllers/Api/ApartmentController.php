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
        $apartments = Apartment::whereHas('sponsorships')->get();
    
        return response()->json(['apartments' => $apartments]);
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
        
        foreach ($apartments as $apartment) {
            $apartment->load('services'); // Carica i servizi associati all'appartamento
        }
            

        return response()->json($apartments);
        
    }









    public function searchPlus(Request $request)
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

        $radius = $request->input('radius', 20);
        $radiusInDegrees = $radius / 111.32;

        // Calcola le coordinate dei limiti del rettangolo (approssimato)
        $minLatitude = $cityCoordinates['latitude'] - $radiusInDegrees; // Approssimazione per 20 km
        $maxLatitude = $cityCoordinates['latitude'] + $radiusInDegrees;
        $minLongitude = $cityCoordinates['longitude'] - $radiusInDegrees;
        $maxLongitude = $cityCoordinates['longitude'] + $radiusInDegrees;

        $numRooms = $request->input('num_rooms');
        $numBathrooms = $request->input('num_bathrooms');
        $squareMeters = $request->input('square_meters');
        $price = $request->input('price');
        $selectedServices = $request->input('serviceID', []);

        $apartments = Apartment::whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude]);
            if ($numRooms) {
                $apartments->where('num_rooms', '>=', $request->input('num_rooms'));
            }

            if ($numBathrooms) {
                $apartments->where('num_bathrooms', '>=', $request->input('num_bathrooms'));
            }

            if ($squareMeters) {
                $apartments->where('square_meters', '>=', $request->input('square_meters'));
            }

            if ($price) {
                $apartments->where('price', '<=', $request->input('price'));
            }

            if ($selectedServices) {
                $apartments->whereHas('services', function ($query) use ($selectedServices) {
                    $query->whereIn('service_id', $selectedServices);
                });
            }
        

        /*$city = $request->input('city');
        if ($city) {
            $apartments = Apartment::where('city', '=', $request->input('city'));
        }*/


        
        


        
        


        
        


        
        


        
        



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

        $apartments = $apartments->get();
        foreach ($apartments as $apartment) {
            $apartment->load('services'); // Carica i servizi associati all'appartamento
        }

        return response()->json($apartments);
    }
}
