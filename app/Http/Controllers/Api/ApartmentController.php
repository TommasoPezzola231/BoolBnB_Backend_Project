<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with("services")->paginate(5);

        $response = [
            "success" => true,
            "apartments" => $apartments
        ];

        return response()->json($response);

        //return view('admin.apartments.index', compact('apartments'));
    }
}
