@extends('layouts.app')

@section('js')
    @vite(['resources/js/auth-register.js'])
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
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
                            <label for="img" class="col-md-4 col-form-label text-md-end">Imagen de usuario</label>

                            <div class="col-md-6 d-flex">
                                <input
                                    id="img"
                                    name="img"
                                    type="file"
                                    accept="image/jpeg"
                                    class="change-type form-control @error('img') is-invalid @enderror col mx-1 text-center"
                                    value="{{ old('img') }}"
                                    required
                                >
                                <button id="avatar" type="button" class="change-type btn btn-primary col mx-1" data-bs-toggle="modal" data-bs-target="#avatarModal">Seleccionar Avatar</button>

                                @error('img')
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
            </div><!-- card -->
        </div>
    </div><!-- main div -->

    <!-- Modal -->
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="avatarModalLabel">Seleccione avatar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col">
                        <img id="avatar_female_001" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_female_001.png" alt="">
                        <img id="avatar_male_001" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_male_001.png" alt="">
                    </div>
                    <div class="col">
                        <img id="avatar_female_002" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_female_002.png" alt="">
                        <img id="avatar_male_002" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_male_002.png" alt="">
                    </div>
                    <div class="col">
                        <img id="avatar_female_003" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_female_003.png" alt="">
                        <img id="avatar_male_003" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_male_003.png" alt="">
                    </div>
                    <div class="col">
                        <img id="avatar_female_004" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_female_004.png" alt="">
                        <img id="avatar_male_004" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_male_004.png" alt="">
                    </div>
                    <div class="col">
                        <img id="avatar_female_005" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_female_005.png" alt="">
                        <img id="avatar_male_005" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_male_005.png" alt="">
                    </div>
                    <div class="col">
                        <img id="avatar_female_006" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_female_006.png" alt="">
                        <img id="avatar_male_006" class="col-12 m-1 img-avatar" src="/storage/img/avatar/avatar_male_006.png" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

</div><!-- contariner -->
@endsection
