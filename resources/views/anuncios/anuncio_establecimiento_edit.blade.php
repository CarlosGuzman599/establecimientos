@extends('layouts.app')

@section('js')
    @vite(['resources/js/anuncio_establecimiento_update.js'])
@endsection

@section('content')
    <div class="container">
        <h4 class="text-center mt-4">Actulizar Anuncio</h4>

        <div class="mt-5 row justify-content-center">
            
            <form class="col-md-9 col-xs-12 card card-body" method="POST" enctype="multipart/form-data" action="{{ route('anuncio_establecimiento.update', $anuncio->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="establecimientos_id" id="establecimientos_id" value="{{$establecimiento->id}}">
                <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="localidades_id" id="localidades_id" value="{{$establecimiento->localidades_id}}">
                <input type="hidden" name="categorias_id" id="categorias_id" value="{{$establecimiento->categoria['id']}}">

                <fieldset class="border p-1 mt-1 mb-3 row">
                    <legend class="text-primary px-2 color-ranita bold fm-releway text-capitalize">{{$establecimiento->nombre}}</legend>
                    <div class="col-2 mb-1">

                        @if ($establecimiento->logo == null)
                            <img class="bussine-img" src="/storage/img/logos/default/{{$establecimiento->categorias_id}}.png">
                        @else
                            <img class="bussine-img" src="{{$establecimiento->logo}}" alt="/storage/logos/default.png">
                        @endif

                    </div>
                    <div class="col-9 mb-1 mx-2 fs-2">
                        <p class="m-0 bussine-detail">Categoria: <span class="text-capitalize">{{$establecimiento->categoria['nombre']}}</span> </p>
                        <p class="m-0 bussine-detail">Localidad: {{$establecimiento->localidad['nombre']}}</p>
                        <p class="m-0 bussine-detail">Domicilio: {{$establecimiento->direccion}}</p>
                    </div>
                </fieldset>


                <div class="form-group">
                    <label for="titulo">Encabezado de la publicacion</label>
                    <input
                    id="titulo"
                    type="text"
                    class="form-control @error('titulo') is-invalid @enderror text-capitalize"
                    placeholder="Encabezado Anuncio"
                    name="titulo"
                    maxlength="25"
                    value="{{ old('titulo', $anuncio->titulo) }}"
                    >
    
                    @error('titulo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea
                        id="descripcion"
                        class="form-control @error('descripcion') is-invalid @enderror"
                        placeholder="descripcion del Establecimiento"
                        name="descripcion"
                    >{{ old('descripcion', $anuncio->descripcion) }}</textarea>
    
                    @error('descripcion')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
    
                <div class="row px-3">

                    <div class="form-group">
                        <label for="img">Imagen Principal</label>
                            <input
                            id="img"
                            type="file"
                            class="form-control @error('img') is-invalid @enderror "
                            name="img"
                            accept="image/*"
                            value="{{ old('img') }}"
                        >    
                        @error('img')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col text-center">
                        <p class="bussine-detail">Imagen actual</p>

                        @if ($anuncio->img == null)
                            <img class="bussine-img" src="/img/default.png">
                        @else
                          <img class="bussine-img" src="{{$anuncio->img}}" alt="./img/default.png">
                        @endif

                    </div>

                </div>

                <div class="form-group">
                    <label for="tiempos_id">Tiempo de vida</label>
                    <select
                        class="form-control @error('tiempos_id') is-invalid @enderror"
                        name="tiempos_id"
                        id="tiempos_id"
                    >
                        <option value="" selected disabled>-- Seleccione --</option>
    
                        @foreach ($tiempos as $tiempo)
                            <option
                            class="text-capitalize"
                            value="{{$tiempo->id}}"
                            {{ old('tiempos_id', $anuncio->tiempos_id) == $tiempo->id  ? 'selected' : '' }}
                            >{{$tiempo->descripcion}}</option>
                            
                        @endforeach
                    </select>
                    @error('tiempos_id')
                    <div class="invalid-feedback">
                        {{str_replace('id', '', $message)}}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <button id="{{ $anuncio->id }}" class="col m-4 btn btn-danger btn-delete"><i class="fa-solid fa-triangle-exclamation"></i> Eliminar</button>
                    <button type="submit" class="col m-4 btn btn-primary" value="update">Save</button>
                </div>
                
            </form>

        </div>
    </div>
@endsection


