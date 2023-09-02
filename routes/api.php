<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController as ApiApartmentController;
use App\Http\Controllers\Api\MessageController as ApiMessageController;


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

Route::get("/apartments", [ApiApartmentController::class, "allApartments"]);
Route::get("/apartments", [ApiApartmentController::class, "spnsoredApartments"]);
Route::get("/apartments/{id}", [ApiApartmentController::class, "show"]);
Route::get('/apartments/search', [ApiApartmentController::class, 'search']);
Route::get('/apartments/searchPlus', [ApiApartmentController::class, 'searchPlus']);
Route::post("/messages/store", [ApiMessageController::class, "store"]);
