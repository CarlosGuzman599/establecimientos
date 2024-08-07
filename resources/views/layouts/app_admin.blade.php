<!--Garcita❤️Dani-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('js')
</head>
<body>
    <div id="app" class="bg-ranita-background">
        <nav class="z-3 navbar navbar-expand-md navbar-light @if (Route::currentRouteName() == "login") bg-transparent @else bg-ranita shadow @endif">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/storage/img/icon.png" alt="" class="icon">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fs-4 mx-4" href="{{ route('login') }}">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fs-4 mx-4" href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a href="{{ route('admin.users.index') }}" class="dropdown-item text-center ch-grey"><i class="fa-solid fa-users"></i> Usuarios</a>
                                    <a href="" class="dropdown-item text-center ch-grey"><i class="fa-solid fa-store"></i> Establecimientos</a>
                                    <a href="" class="dropdown-item text-center ch-grey"><i class="fa-regular fa-newspaper"></i> Anuncios</a>
                                    <a href="" class="dropdown-item text-center ch-grey"><i class="fa-solid fa-gear"></i> Ajustes</a>

                                    <a class="dropdown-item text-center bg-red fw-bold" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
            <div class="row p-2 m-1">
                <a href="{{ route('admin.users.index') }}" class="col rounded text-center m-1 p-1 access access-1">
                    <span class="col d-block">
                        <i class="fa-solid fa-users"></i>
                    </span>
                    <span class="col d-block">Usuarios</span>
                </a>
                <a href="{{ route('establecimiento.index') }}" class="col rounded text-center m-1 p-1 access access-2">
                    <span class="col d-block">
                        <i class="fa-solid fa-store"></i>
                    </span>
                    <span class="col d-block">Establecimientos</span>
                </a>
                <a href="{{ route('anuncio_establecimiento.index') }}" class="col rounded text-center m-1 p-1 access access-3">
                    <span class="col d-block">
                        <i class="fa-regular fa-newspaper"></i>
                    </span>
                    <span class="col d-block">Anuncios</span>
                </a>
                <a href="" class="col rounded text-center m-1 p-1 access access-4">
                    <span class="col d-block">
                        <i class="fa-solid fa-gear"></i>
                    </span>
                    <span class="col d-block">Ajustes</span>
                </a>
            </div>
            @yield('content')
        </main>
        <div class="z-3 container-footer justify-content-center p-2 fw-bold fs-5 bg-ranita-background @if (Route::currentRouteName() == "login") c-white bg-transparent @endif">
            <p class="m-0 ">Todos los derechos reservados &copy <span>Ranita</span> 2024</p>
        </div>
    </div>
</body>
</html>
