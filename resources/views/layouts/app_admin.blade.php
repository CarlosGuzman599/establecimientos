<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Ranita</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@300;400;600;900&display=swap" rel="stylesheet">
    
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/0e074d7bfb.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/js/all.js"></script>
        <script>
            window.addEventListener('popstate', function(event) {
            history.pushState(null, null, window.location.pathname);
            history.pushState(null, null, window.location.pathname);
            }, false);
        </script>
        @yield('scripts')
    
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
        @yield('styles')


    </head>
    <body id="page-top" class="fm-quick sidebar-toggled">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm shadow">
            <div class="container">
                <a class="navbar-brand col" href="{{ url('/') }}"><img src="/img/icon.png" alt="" class="icon"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle color-grey" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse bg-grey shadow">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-4">
                                <a class="btn fs-2" href="#"><i class="far fa-clipboard"></i> Dashboard</a>
                            </li>
                            <li class="nav-item mb-4">
                                <a class="btn fs-2" href="#"><i class="fas fa-users"></i> Usuarios</a>
                            </li>
                            <li class="nav-item mb-4">
                                <a class="btn fs-2" href="#"><i class="fas fa-store"></i> Establecimientos</a>
                            </li>
                            <li class="nav-item mb-4">
                                <a class="btn fs-2" href="#"><i class="far fa-newspaper"></i> Anuncios</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="py-4">
                    @yield('content')
                </main>

                
            </div>
            <div class="container-footer bg-black justify-content-center p-1 shadow-in-img">
                <p class="m-0 color-white">Todos los derechos reservados &copy <span>Ranita</span> 2024</p>
            </div>
        </div>
    
        @yield('scripts')
        
    </body>
</html>