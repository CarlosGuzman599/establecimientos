@extends('layouts.app')

@section('js')
    @vite(['resources/js/establecimientos_create.js'])
    @vite(['resources/js/establecimientos_update.js'])
@endsection

@section('content')
    <div class="container">
        <h4 class="text-center mt-4">Editar Establecimiento</h4>

        <div class="mt-5 row justify-content-center">
            <form class="col-md-9 col-xs-12 card card-body" method="POST" enctype="multipart/form-data" action="{{ route('establecimiento.update', $establecimiento->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="nombre">Nombre Establecimiento</label>
                    <input
                    id="nombre"
                    type="text"
                    class="form-control @error('nombre') is-invalid @enderror text-capitalize"
                    placeholder="Nombre Establecimiento"
                    name="nombre"
                    value="{{ old('nombre', $establecimiento->nombre) }}"
                    >
    
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="nombre">Numero telefonico</label>
                    <input
                    id="telefono"
                    type="tel"
                    class="form-control @error('telefono') is-invalid @enderror "
                    placeholder="Telefono del Establecimiento"
                    name="telefono"
                    value="{{ old('telefono', $establecimiento->telefono) }}"
                    >
    
                    @error('telefono')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select
                        class="form-control @error('categorias_id') is-invalid @enderror"
                        name="categorias_id"
                        id="categoria"
                    >
                        <option value="" selected disabled>-- Seleccione --</option>
    
                        @foreach ($categorias as $categoria)
                        <option
                            class="text-capitalize"
                            value="{{$categoria->id}}"
                            {{ old('categorias_id', $establecimiento->categorias_id) == $categoria->id  ? 'selected' : '' }}
                        >{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    @error('categorias_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
    
                <div class="row">

                    <div class="form-group col">
                        <label for="logo">Imagen Principal</label>
                            <input
                            id="logo"
                            type="file"
                            class="form-control @error('logo') is-invalid @enderror "
                            name="logo"
                            accept="image/*"
                            value="{{ old('logo') }}"
                        >    
                        @error('logo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col text-center">
                        <p class="bussine-detail">Imagen actual</p>

                        @if ($establecimiento->logo == null)
                            <img class="bussine-img" src="/storage/img/logos/default/{{$establecimiento->categorias_id}}.png">
                        @else
                            <img class="bussine-img" src="{{$establecimiento->logo}}" alt="/storage/logos/default.png">
                        @endif

                    </div>

                </div>

                <div class="form-group">
                    <label for="protection">Proctecion</label>
                    <p class="bussine-detail mt-0 color-red">Esta funcion permite mostrar o ocultar numero telefonico a personas no registradas en la aplicacion. Aplica en anuncios</p>
                    <select
                        class="form-control @error('protection') is-invalid @enderror"
                        name="protection"
                        id="protection"
                    >
                        <option selected disabled>-- Seleccione --</option>
                        <option value="1" {{ old('protection', $establecimiento->protection) == "1"  ? 'selected' : '' }}>Si</option>
                        <option value="0" {{ old('protection', $establecimiento->protection) == "0"  ? 'selected' : '' }}>No</option>
    
                    </select>
                    @error('protection')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="delivery">Servicio a domicilio</label>
                    <select
                        class="form-control @error('delivery') is-invalid @enderror"
                        name="delivery"
                        id="delivery"
                    >
                        <option selected disabled>-- Seleccione --</option>
                        <option value="1" {{ old('delivery', $establecimiento->delivery) == "1"  ? 'selected' : '' }}>Si</option>
                        <option value="0" {{ old('delivery', $establecimiento->delivery) == "0"  ? 'selected' : '' }}>No</option>
    
                    </select>
                    @error('delivery')
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
                    >{{ old('descripcion', $establecimiento->descripcion) }}</textarea>
    
                    @error('descripcion')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <fieldset class="border p-4 mt-5">
                    <legend class="text-primary">Horarios:</legend>
                    <input 
                        type="hidden" 
                        name="horario" 
                        id="horario" 
                        value='{{ old('horario', $establecimiento->horario) }}'
                    >

                    <label for="localidad">Lunes</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day0">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open0" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close0" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                    <label for="localidad">Martes</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day1">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open1" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close1" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                    <label for="localidad">Miercoles</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day2">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open2" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close2" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                    <label for="localidad">Jueves</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day3">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open3" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close3" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                    <label for="localidad">Viernes</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day4">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open4" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close4" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                    <label for="localidad">Sabado</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day5">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open5" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close5" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                    <label for="localidad">Domingo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" aria-label="lunes" class="check update-time" id="day6">
                          </div>
                        </div>
                        <input class="form-control update-time" disabled type="time" id="open6" name="open" max="23:59:00" min="5:00:00" step="1">
                        <input class="form-control update-time" disabled type="time" id="close6" name="close" max="23:59:00" min="5:00:00" step="1">
                    </div>

                </fieldset>

                <fieldset class="border p-4 mt-5">
                    <legend class="text-primary">Ubicación:</legend>
    
                    <div class="form-group">
                        <label for="localidad">Localidad</label>
        
                        <select
                            class="form-control @error('localidades_id') is-invalid @enderror"
                            name="localidades_id"
                            id="localidad"
                        >
                            <option value="" selected disabled>-- Seleccione --</option>
        
                            @foreach ($localidades as $localidad)
                            <option
                                class="text-capitalize"
                                value="{{$localidad->id}}"
                                {{ old('localidades_id', $establecimiento->localidades_id) == $localidad->id  ? 'selected' : '' }}
                            >{{$localidad->nombre}}</option>
        
                            @endforeach
                        </select>
                        @error('localidades_id')
                            <div class="invalid-feedback">
                            {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="formbuscador">Coloca la dirección del Establecimiento</label>
                        <input
                            id="formbuscador"
                            type="text"
                            placeholder="Calle del Negocio o Establecimiento"
                            class="form-control"
                        >
                        <p class="text-secondary mt-5 mb-3 text-center">El asistente colocará una dirección estimada o mueve el Pin hacia el lugar correcto</p>
                    </div>
    
                    <div class="form-group">
                    <div id="mapa" style="height: 400px;"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
        
                        <input
                            type="text"
                            id="direccion"
                            class="form-control @error('direccion') is-invalid @enderror text-capitalize"
                            placeholder="Dirección"
                            value="{{old('direccion', $establecimiento->direccion)}}"
                            name="direccion"
                        >
                        @error('direccion')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="colonia">Colonia</label>
        
                        <input
                            type="text"
                            id="colonia"
                            class="form-control @error('colonia') is-invalid @enderror text-capitalize"
                            placeholder="Colonia"
                            value="{{old('colonia', $establecimiento->colonia)}}"
                            name="colonia"
                        >
                        @error('colonia')
                            <div class="invalid-feedback">
                            {{$message}}
                            </div>
                        @enderror
                    </div>

                    <input type="hidden" id="users_id" name="users_id" value="{{$user->id}}">
                    <input type="hidden" id="lat" name="lat" value="0000000">
                    <input type="hidden" id="lng" name="lng" value="0000000">
                </fieldset>

                <div class="row">

                    @if (Auth::user()->tipo_users_id == 1)
                        <div class="form-group">
                            <label for="localidad">Estado</label>
            
                            <select
                                class="form-control @error('states_id') is-invalid @enderror"
                                name="states_id"
                                id="states_id"
                            >
                                <option value="" selected disabled>-- Seleccione --</option>
            
                                @foreach ($states as $state)
                                <option
                                    class="text-capitalize"
                                    value="{{$state->id}}"
                                    {{ old('states_id', $establecimiento->states_id) == $state->id  ? 'selected' : '' }}
                                >{{$state->descripcion}}</option>
            
                                @endforeach
                            </select>
                            @error('states_id')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                            @enderror
                        </div>
                    @else
                        <button id="{{ $establecimiento->id }}" class="col m-4 btn btn-danger btn-delete"><i class="fa-solid fa-triangle-exclamation"></i> Eliminar</button>
                    @endif

                    <button type="submit" class="col m-4 btn btn-primary">Save</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection


