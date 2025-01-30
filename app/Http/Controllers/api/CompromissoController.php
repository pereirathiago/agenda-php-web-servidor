<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Compromisso;
use App\Http\Requests\compromisso\StoreCompromissoRequest;
use App\Http\Requests\compromisso\UpdateCompromissoRequest;

class CompromissoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompromissoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Compromisso $compromisso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompromissoRequest $request, Compromisso $compromisso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compromisso $compromisso)
    {
        //
    }
}
