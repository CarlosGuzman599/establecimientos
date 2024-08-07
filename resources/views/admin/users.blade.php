@extends('layouts.app_admin')

@section('js')
    @vite(['resources/js/admin-users.js'])
@endsection

@section('content')

    <div class="container">
        <h1 class="text-center mt-2">Usuarios</h1>

        <table class="table" id="table-users">
            <thead>
                <tr>
                <th class="col text-center">Nombre</th>
                <th class="col text-center d-none d-sm-table-cell">Telefono</th>
                <th class="col text-center d-none d-sm-table-cell">Localidad</th>
                <th class="col text-center">Estado</th>
                <th class="col text-center">Tipo</th>
                <th class="col text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th class="col">
                            <span class="col d-block d-xs-block d-sm-none text-center">{{  explode(" ", $user->name)[0] }} {{explode(" ", $user->name)[1]}}</span>
                            <span class="col d-none d-sm-block text-center">{{  $user->name }}</span>
                        </th>
                        <td class="col text-center d-none d-sm-table-cell">{{$user->phone}}</td>
                        <td class="col text-center d-none d-sm-table-cell">{{$user->localidad['nombre']}}</td>
                        <td class="col text-center">{{$user->state_user['descripcion']}}</td>
                        <td class="col text-center">{{$user->tipo_user['nombre']}}</td>
                        <td class="col text-center m-5" id="{{  $user->id }}">
                            <a href="{{ route('users.edit', $user->id) }}"><i class="col fa-regular fa-pen-to-square c-orange"></i></a>
                            <i class="col fa-regular fa-eye c-green"></i>
                        </td>
                    </tr>
                @endforeach

                </tr>
            </tbody>
        </table>

    </div><!-- containerdiv -->
@endsection
