<?php

namespace App\Http\Controllers;

use App\Models\Tiempos;
use App\Http\Requests\StoreTiemposRequest;
use App\Http\Requests\UpdateTiemposRequest;

class TiemposController extends Controller
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
     * @param  \App\Http\Requests\StoreTiemposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTiemposRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiempos  $tiempos
     * @return \Illuminate\Http\Response
     */
    public function show(Tiempos $tiempos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiempos  $tiempos
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiempos $tiempos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTiemposRequest  $request
     * @param  \App\Models\Tiempos  $tiempos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTiemposRequest $request, Tiempos $tiempos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiempos  $tiempos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiempos $tiempos)
    {
        //
    }
}
