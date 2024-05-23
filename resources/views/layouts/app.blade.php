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
</head>
<body>
    <div id="app" class="bg-ranita-wallpaper fm-sans">

        <div class="row justify-content-center">
            <div class="notification-space px-3 text-center mb-3" id="notification">
                <p class="mt-3 mb-0 text-bold fm-releway" id="notification-header"></p>
                <P class="mt-0 fm-releway" id="notification-message">message</P>
            </div>
        </div>

        <nav class="row navbar navbar-expand-md navbar-light bg-ranita shadow rounded-bottom navbar-personal justify-content-center">
            <div class="container row justify-content-between">
                <a class="navbar-brand col" href="{{ url('/') }}"><img src="storage/img/icon.png" alt="" class="icon"></a>
                
                <button class="navbar-toggler col" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fs-3 mx-3" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i></a>
                                    
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fs-3 mx-3" href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                                    
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fs-3 mx-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="far fa-user-circle"></i></a>

                                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/">Principal</a>
                                    <a class="dropdown-item" href="{{ route('home') }}">Mis anuncios</a>
                                    <a class="dropdown-item btn-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="height:99%">
            @yield('content')
        </main>

        <div class="container-footer bg-ranita justify-content-center p-1 shadow-in-img">
            <p class="m-0 color-white">Todos los derechos reservados &copy <span>Ranita</span> 2024</p>
        </div>

    </div>
</body>
</html>
