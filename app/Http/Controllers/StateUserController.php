<?php

namespace App\Http\Controllers;

use App\Models\StateUser;
use App\Http\Requests\StoreStateUserRequest;
use App\Http\Requests\UpdateStateUserRequest;

class StateUserController extends Controller
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
     * @param  \App\Http\Requests\StoreStateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function show(StateUser $stateUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function edit(StateUser $stateUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStateUserRequest  $request
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateUserRequest $request, StateUser $stateUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(StateUser $stateUser)
    {
        //
    }
}
