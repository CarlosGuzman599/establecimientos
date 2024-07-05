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


        <!-- Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserLabel">Editar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="localidad_users_id" class="col-md-4 col-form-label text-md-end">Localidad</label>

                        <div class="col-md-6">
                            <select
                                class="form-control @error('localidad_users_id') is-invalid @enderror"
                                name="localidad_users_id"
                                id="localidad_users_id"
                                value="{{ old('localidad_users_id') }}"
                                required
                            >
                                <option value="" selected disabled>-- Seleccione --</option>

                                @foreach ($localidades as $localidad)
                                <option
                                    class="text-capitalize"
                                    value="{{$localidad->id}}"
                                    {{ old('localidad_users_id') == $localidad->id  ? 'selected' : '' }}
                                >{{$localidad->nombre}}</option>

                                @endforeach
                            </select>
                            @error('localidad_users_id')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="state_users_id" class="col-md-4 col-form-label text-md-end">Estado</label>

                        <div class="col-md-6">
                            <select
                                class="form-control @error('state_users_id') is-invalid @enderror"
                                name="state_users_id"
                                id="state_users_id"
                                value="{{ old('state_users_id') }}"
                                required
                            >
                                <option value="" selected disabled>-- Seleccione --</option>

                                @foreach ($state_user as $su)
                                <option
                                    class="text-capitalize"
                                    value="{{$su->id}}"
                                    {{ old('state_users_id') == $su->id  ? 'selected' : '' }}
                                >{{$su->descripcion}}</option>

                                @endforeach
                            </select>
                            @error('state_users_id')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tipo_users_id" class="col-md-4 col-form-label text-md-end">Tipo Usuario</label>

                        <div class="col-md-6">
                            <select
                                class="form-control @error('tipo_users_id') is-invalid @enderror"
                                name="tipo_users_id"
                                id="tipo_users_id"
                                value="{{ old('tipo_users_id') }}"
                                required
                            >
                                <option value="" selected disabled>-- Seleccione --</option>

                                @foreach ($tipo_users as $tu)
                                <option
                                    class="text-capitalize"
                                    value="{{$tu->id}}"
                                    {{ old('tipo_users_id') == $tu->id  ? 'selected' : '' }}
                                >{{$tu->nombre}}</option>

                                @endforeach
                            </select>
                            @error('tipo_users_id')
                                <div class="invalid-feedback">
                                {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form><!-- form -->


            </div>
            </div>
        </div>

    </div><!-- containerdiv -->
@endsection
