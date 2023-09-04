<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\view;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function store(Request $request)
    {
        // -----------
        $ip_address = $request->ip_address;
        $apartment_id = $request->apartment_id;

        $view = view::where('ip_address', $ip_address)
            ->where('apartment_id', $apartment_id)
            ->first();

        if ($view) {
            return response()->json([
                'success' => false,
                'message' => 'view already exists',
                'data' => null
            ]);
        }

        $view = new view();

        $view->ip_address = $ip_address;
        $view->apartment_id = $apartment_id;

        $view->save();

        return response()->json([
            'success' => true,
            'message' => 'view created',
            'data' => $view
        ]);
    }
}
