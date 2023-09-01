<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Api\ApartmentController as ApiApartmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/apartments/search', [ApiApartmentController::class, 'search']);
//rotta che, quando richiamata con richiesta GET all'endpoint /apartments/search, eseguirà il metodo search del \Api|ApartmentController

Route::get('/apartments/searchPlus', [ApiApartmentController::class, 'searchPlus']);

Route::get("/apartments", [ApiApartmentController::class, "spnsoredApartments"]);
