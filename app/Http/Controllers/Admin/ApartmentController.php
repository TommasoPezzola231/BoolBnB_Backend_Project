<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\User;
use App\Models\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user();
        $apartments = $user_id->apartments;

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view("admin.apartments.create", compact('services'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {

        $indirizzo = $request['address'];
        $city = $request->input('city');
        $country = $request->input('country');


        $url = 'https://api.tomtom.com/search/2/geocode/' . urlencode($indirizzo) . "-" . $city . "-" . $country . '.json';
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

        $data = $request->validated();

        $data['latitude'] = $latitudine;
        $data['longitude'] = $longitudine;


        if (array_key_exists("principal_image", $data)) {

            //$img_path = $data["principal_image"]->store("uploads");
            $img_path = Storage::put("uploads", $data["principal_image"]);
            $data['principal_image'] = $img_path;
        }


        $newApartment = new Apartment();

        $newApartment->fill($data);
        $newApartment->user_id = Auth::user()->id;
        $newApartment->slug = $newApartment->title;

        $newApartment->save();

        $newApartment->services()->attach($data['serviceID']);


        return to_route('admin.apartments.show', $newApartment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();

        return view('admin.apartments.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {

        $indirizzo = $request['address'];
        $url = 'https://api.tomtom.com/search/2/geocode/' . urlencode($indirizzo) . '.json';
        $apiKey = env('TOMTOM_API_KEY');

        $response = Http::get($url, [
            'key' => $apiKey //env('KEY_TOMTOM')
        ]);

        $data_api = $response->json();

        $latitudine = $data_api['results'][0]['position']['lat'];
        $longitudine = $data_api['results'][0]['position']['lon'];

        $data = $request->validated();

        $data['latitude'] = $latitudine;
        $data['longitude'] = $longitudine;

        if (array_key_exists("principal_image", $data)) {

            //$img_path = $data["principal_image"]->store("uploads");
            $img_path = Storage::put("uploads", $data["principal_image"]);
            $data['principal_image'] = $img_path;
        }

        //$apartment = new Apartment();
        //$apartment->fill($data);


        $apartment->update($data);

        //$apartment->services()->attach($data['serviceID']);
        $apartment->services()->sync($data["serviceID"]);

        return to_route('admin.apartments.show', $apartment->id); //da cambiare
    }

    public function archive(Apartment $apartment)
    {
        $user = Auth::user();
        $deletedApartments = $user->apartments()->onlyTrashed()->get();
    
        return view('admin.apartments.archive', compact('deletedApartments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment, Request $request)
    {
        if ($apartment->trashed()) {
            $apartment->forceDelete();
            return redirect()->route("admin.apartments.index");
        } else {
            $apartment->delete();
            return redirect()->route("admin.apartments.index");
        }
    }
};
