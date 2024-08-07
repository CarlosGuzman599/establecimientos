@extends('layouts.app_admin')

@section('js')
    @vite(['resources/js/admin-anuncios.js'])
@endsection

@section('content')

    <div class="container">
        <h1 class="text-center mt-2">Anuncios</h1>

        <table class="table" id="table-anuncios">
            <thead>
                <tr>
                <th class="col text-center">Nombre</th>

                <th class="col text-center d-none d-sm-table-cell">Localidad</th>
                <th class="col text-center">Estado</th>
                <th class="col text-center">Tipo</th>
                <th class="col text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($anuncios as $anuncio)
                    <tr>
                        <th class="col">
                            <span class="col d-none d-sm-block text-center text-capitalize">{{  $anuncio->titulo }}</span>
                        </th>

                        <td class="col text-center d-none d-sm-table-cell">{{ $anuncio->localidad['nombre'] }}</td>
                        <td class="col text-center d-none d-sm-table-cell">{{ $anuncio->state['descripcion'] }}</td>
                        <td class="col text-center d-none d-sm-table-cell text-capitalize">{{ $anuncio->categoria['nombre'] }}</td>
                        <td class="text-center">
                            <a href="{{ route('anuncio_establecimiento.edit', $anuncio->id) }}"><i class="col fa-regular fa-pen-to-square c-orange"></i></a>
                            <i class="col fa-regular fa-eye c-green"></i>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div><!-- containerdiv -->
@endsection
