@extends('layouts.app')

@section('js')
    @vite(['resources/js/login.js'])
@endsection

@section('content')
<div id="img-container"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 row justify-content-center">
            <div class="card rounded-0 bg-ranita-background mt-5 col-md-12 col-lg-8 col-xl-8 col-xxl-8" id="card-login">
                <div class="row card-body sm-p-5 md-p-5 lg-p-5 xl-p-5 xxl-p-5 justify-content-center">

                    <div class="row justify-content-center">
                        <img class="img-login" src="/storage/img/RanitaCompleto.png" alt="">
                    </div>

                    <form method="POST" action="{{ route('login') }}" id="form-login" class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        @csrf

                        <div class="form-group col">
                            <label for="email" class="col-form-label text-md-right">Celular</label>
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif

                            </div>


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
