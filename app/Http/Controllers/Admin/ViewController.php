<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\view;
use App\Http\Requests\StoreviewRequest;
use App\Http\Requests\UpdateviewRequest;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.views.index', [
        //     'views' => view::all(),
        // ]);
        // ??


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
     * @param  \App\Http\Requests\StoreviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function show(view $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(view $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateviewRequest  $request
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateviewRequest $request, view $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(view $view)
    {
        //
    }
}
