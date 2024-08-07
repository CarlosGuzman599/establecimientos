@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="text-center align-content-center">
      @if ($establecimiento->logo == null)
        <img class="bussine-img" src="/storage/img/logos/default/{{$establecimiento->categorias_id}}.png">
      @else
        <img class="bussine-img" src="{{$establecimiento->logo}}" alt="/storage/logos/default.png">
      @endif
      <h3 class="text-capitalize">{{$establecimiento->nombre}}</h4>
    </div>
  
    <fieldset class="border p-4 mt-5">
      <legend class="text-primary px-2 color-ranita bold fm-releway">Mis anuncios</legend>


      <div class="mt-2 row justify-content-end container">
        <a class="btn-personal btn-primery-personal shadow-lg" href="{{ route('anuncio_establecimiento.create', $establecimiento->id) }}">Agregar nuevo</a>
      </div>

      @foreach ($anuncios as $anuncio)
        <div class="bussine-container m-3 row shadow" id="container-{{$anuncio->id}}">

          <div class="col-3 p-0 m-0 d-flex p-1">
            @if ($anuncio->img == null)
              <img class="bussine-img rounded" src="/storage/img/anuncios/default.png">
            @else
              <img class="bussine-img rounded shadow" src="{{$anuncio->img}}" alt="/storage/img/anuncios/default.png">
            @endif
          </div>

          <div class="col-5 p-0 m-0 text-center">
            <p class="bussine-name text-capitalize">{{$anuncio->titulo}}</p>
            <p class="bussine-detail">{{$anuncio->tiempos['descripcion']}} · {{$anuncio->created_at}}</p>
          </div>

          <div class="col-4 row ml-1" name="{{$anuncio->titulo}}" id="{{$anuncio->id}}">


            @if ($anuncio->states_id != 1)
              <p class="bussine-fail text-center">Establecimiento inactivo/bloqueado contacte al administrador</p>
            @else
              <a href="{{ route('anuncio_establecimiento.edit', $anuncio->id) }}" class="btn-function no-hover col m-auto"><i class="fa-regular fa-pen-to-square c-orange"></i></a>
            @endif
          </div>

        </div>
      @endforeach
    </fieldset>
  </div>
@endsection
