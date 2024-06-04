@extends('layouts.app_admin')

@section('js')
    @vite(['resources/js/admin-users.js'])
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center mt-2">Usuarios</h1>
        <table class="table text-center">
            <thead>
              <tr>
                <th class="col">Nombre</th>
                <th class="col d-none">Telefono</th>
                <th class="col d-none">Localidad</th>
                <th class="col">Estado</th>
                <th class="col d-none">Tipo</th>
                <th class="col">Acciones</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->name}}</th>
                        <td class=" d-none">{{$user->phone}}</td>
                        <td class=" d-none">{{$user->localidad['nombre']}}</td>
                        <td>{{$user->state_user['descripcion']}}</td>
                        <td class=" d-none">{{$user->tipo_user['nombre']}}</td>
                        <td>
                            <i class="fa-regular fa-pen-to-square"></i>
                            <i class="fa-regular fa-trash-can"></i>
                            <i class="fa-regular fa-eye"></i>
                        </td>
                    </tr>
                @endforeach

              </tr>
            </tbody>
          </table>

    </div>
@endsection