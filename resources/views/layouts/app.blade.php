<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <a href="#" class="brand-logo"><span>SGP</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i> Home </a>
                <a href="#" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
            </a>
                <a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Upload </a>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-photo-video"></i> Cadastros </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{route('clientes') }}" class="dashboard-nav-dropdown-item">Clientes</a>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-photo-video"></i> Media </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                </div>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                    <i class="fas fa-photo-video"></i> Media </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                        <a href="#" class="dashboard-nav-dropdown-item">All</a>
                </div>
                <a href="#" class="dashboard-nav-item">
                    <i class="fas fa-cogs"></i> Settings </a>
                    <a href="#" class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
              <div class="nav-item-divider"></div>
              <a href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    @endguest
                    @unless (Auth::check())
                        <li class="nav-item">
                        </li>
                    @endunless
                </ul>
            </header>
            <main class="">
                @yield('content')
            </main>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
    $(document).ready(function () {
        $(".dashboard-nav-dropdown-toggle").click(function () {
            $(this).closest(".dashboard-nav-dropdown")
                .toggleClass("show")
                .find(".dashboard-nav-dropdown")
                .removeClass("show");
            $(this).parent()
                .siblings()
                .removeClass("show");
        });
        $(".menu-toggle").click(function () {
            if (mobileScreen.matches) {
                $(".dashboard-nav").toggleClass("mobile-show");
            } else {
                $(".dashboard").toggleClass("dashboard-compact");
            }
        });
    });
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>
</html>
