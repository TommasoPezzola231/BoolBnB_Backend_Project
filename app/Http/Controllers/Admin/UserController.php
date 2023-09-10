<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\view;

class UserController extends Controller
{
    public function stats()
    {
        $userId = auth()->id(); // Ottieni l'ID dell'utente corrente
        $userApartments = Apartment::where('user_id', $userId)->get(); // Recupera tutti gli appartamenti dell'utente

        // Recupera gli ID degli appartamenti dell'utente
        $userApartmentIds = $userApartments->pluck('id');

        // Recupera le visualizzazioni per gli appartamenti dell'utente
        $views = View::whereIn('apartment_id', $userApartmentIds)->get();

        // Calcola le visualizzazioni totali per ciascun appartamento
        $apartmentViews = $views->groupBy('apartment_id')->map(function ($views) {
            return count($views);
        });

        return view('admin.stats.index', compact('userApartments', 'apartmentViews'));
    }
}
