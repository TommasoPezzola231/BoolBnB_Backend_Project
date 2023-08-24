<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Http\Requests\StoreAppartmentRequest;
use App\Http\Requests\UpdateAppartmentRequest;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appartment  $appartment
     * @return \Illuminate\Http\Response
     */
    public function show(Appartment $appartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appartment  $appartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appartment $appartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppartmentRequest  $request
     * @param  \App\Models\Appartment  $appartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppartmentRequest $request, Appartment $appartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appartment  $appartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appartment $appartment)
    {
        //
    }
}
