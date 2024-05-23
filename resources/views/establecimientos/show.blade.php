@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>

  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" integrity="sha256-NkyhTCRnLQ7iMv7F3TQWjVq25kLnjhbKEVPqGJBcCUg=" crossorigin="anonymous" />

@endsection

@section('content')
  <div class="container">

    <div class="text-center align-content-center">
      @if ($establecimiento->logo == null)
        <img class="bussine-img" src="/storage/logos/default/{{$establecimiento->categorias_id}}.png">
      @else
        <img class="bussine-img" src="{{$establecimiento->logo}}" alt="/storage/logos/default.png">
      @endif
      <h3 class="text-capitalize">{{$establecimiento->nombre}}</h4>
    </div>
  
    <fieldset class="border p-4 mt-5">
      <legend class="text-primary px-2 color-ranita bold fm-releway">Mis anuncios</legend>


      <div class="mt-2 row justify-content-end container">
        <a href="{{ route('home') }}" class="no-hover mx-5"><img class="btn-home" src="/storage/icons/home.png"></a>
        <a class="btn-personal btn-primery-personal shadow-lg" href="{{ route('anuncio_establecimiento.create', $establecimiento->id) }}">Agregar nuevo</a>
      </div>

      @foreach ($anuncios as $anuncio)
        <div class="bussine-container m-3 row shadow" id="container-{{$anuncio->id}}">

          <div class="col-3 p-0 m-0 d-flex p-1">
            @if ($anuncio->img == null)
              <img class="bussine-img rounded" src="/storage/anuncios/default.png">
            @else
              <img class="bussine-img rounded shadow" src="{{$anuncio->img}}" alt="/storage/anuncios/default.png">
            @endif
          </div>

          <div class="col-5 p-0 m-0 text-center">
            <p class="bussine-name text-capitalize">{{$anuncio->titulo}}</p>
            <p class="bussine-detail">{{$anuncio->tiempos['descripcion']}} · {{$anuncio->created_at}}</p>
          </div>

          <div class="col-4 row ml-1" name="{{$anuncio->titulo}}" id="{{$anuncio->id}}">
            <!-- <a href="" class="btn-function no-hover"><img class="btn-function" src="/storage/icons/tags.png"></a> -->
            <a href="{{ route('anuncio_establecimiento.edit', $anuncio->id) }}" class="btn-function no-hover"><img class="btn-function" src="/storage/icons/edit.png"></a>
            <img class="btn-function delete-anuncio" src="/storage/icons/delete.png">
          </div>

        </div>
      @endforeach
    </fieldset>
  </div>
@endsection

@section('scripts')
<script src="{{ asset('js/establecimientos_show.js') }}" defer></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <script src="https://unpkg.com/esri-leaflet" defer></script>
  <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js" integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous" defer></script>
@endsection