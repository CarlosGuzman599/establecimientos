<?php

namespace App\Http\Controllers;

use App\Models\TipoUser;
use App\Http\Requests\StoreTipoUserRequest;
use App\Http\Requests\UpdateTipoUserRequest;

class TipoUserController extends Controller
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
     * @param  \App\Http\Requests\StoreTipoUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoUser  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function show(TipoUser $tipoUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoUser  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoUser $tipoUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoUserRequest  $request
     * @param  \App\Models\TipoUser  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoUserRequest $request, TipoUser $tipoUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoUser  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoUser $tipoUser)
    {
        //
    }
}
