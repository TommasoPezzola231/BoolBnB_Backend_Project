<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{

    // apartments all
    public function allApartments()
    {
        $apartments = Apartment::where('visible', 1)->get();

        return response()->json(['apartments' => $apartments]);
    }

    // sponsored apartments
    public function spnsoredApartments()
    {
        $apartments = Apartment::whereHas('sponsorships')->where('visible', 1)->paginate(4);

        return response()->json(['apartments' => $apartments]);
    }

    public function show($id)
    {

        $apartment = Apartment::with('services', 'images', 'user')->where('visible', 1)->find($id);

        if (!$apartment) {
            return response()->json(['error' => 'Appartamento non trovato'], 404);
        }

        $response = [
            "success" => true,
            "apartment" => $apartment,
            "user_name" => $apartment->user
        ];


        return response()->json($response);
    }

    // apartments search
    public function search(Request $request)
    {
        $city = $request->input('city');

        $url = 'https://api.tomtom.com/search/2/geocode/' . urlencode($city) . '.json';
        $apiKey = env('TOMTOM_API_KEY');

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

        $apartments = Apartment::select('apartments.*')
            ->addSelect(DB::raw('CASE WHEN apartment_sponsorship.id IS NOT NULL THEN 1 ELSE 0 END as is_sponsored'))
            ->leftJoin('apartment_sponsorship', 'apartments.id', '=', 'apartment_sponsorship.apartment_id')
            ->whereBetween('latitude', [$minLatitude, $maxLatitude])
            ->whereBetween('longitude', [$minLongitude, $maxLongitude])
            ->where('visible', 1)
            ->orderByRaw('CASE WHEN apartment_sponsorship.id IS NOT NULL THEN 0 ELSE 1 END, apartment_sponsorship.end_time DESC')
            ->get();


        foreach ($apartments as $apartment) {
            $apartment->load('services'); // Carica i servizi associati all'appartamento
        }

        return response()->json($apartments);
    }

    // apartments search plus
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
            ->whereBetween('longitude', [$minLongitude, $maxLongitude])
            ->where('visible', 1);
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
            foreach ($selectedServices as $serviceId) {
                $apartments->whereHas('services', function ($query) use ($serviceId) {
                    $query->where('service_id', $serviceId);
                });
            }
        }

        // Ordina gli appartamenti in base alla sponsorizzazione
        $apartments = $apartments
            ->leftJoin('apartment_sponsorship', 'apartments.id', '=', 'apartment_sponsorship.apartment_id')
            ->select('apartments.*', DB::raw('CASE WHEN apartment_sponsorship.id IS NOT NULL THEN 1 ELSE 0 END as is_sponsored'))
            ->orderByDesc('apartment_sponsorship.end_time')
            ->get();

        foreach ($apartments as $apartment) {
            $apartment->load('services'); // Carica i servizi associati all'appartamento
        }

        return response()->json($apartments);
    }
}
