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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css" />
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <a href="#" class="brand-logo"><span>SGP</span></a>
            </header>
            <nav class="dashboard-nav-list">
                <a href="{{route('home')}}" class="dashboard-nav-item"><i class="fas fa-home"></i> Home </a>
                <a href="#" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
                </a>
                <div class='dashboard-nav-dropdown'>
                    <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
                        <i class="fas fa-user-plus"></i>Cadastros </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="{{ route('clientes') }}" class="dashboard-nav-dropdown-item">Clientes</a>
                        <a href="{{ route('tipo_objeto') }}" class="dashboard-nav-dropdown-item">Tipos de objeto</a>
                        <a href="{{ route('prestadores') }}" class="dashboard-nav-dropdown-item">Prestadores</a>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>

    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
        $(document).ready(function() {
            $(".dashboard-nav-dropdown-toggle").click(function() {
                $(this).closest(".dashboard-nav-dropdown")
                    .toggleClass("show")
                    .find(".dashboard-nav-dropdown")
                    .removeClass("show");
                $(this).parent()
                    .siblings()
                    .removeClass("show");
            });
            $(".menu-toggle").click(function() {
                if (mobileScreen.matches) {
                    $(".dashboard-nav").toggleClass("mobile-show");
                } else {
                    $(".dashboard").toggleClass("dashboard-compact");
                }
            });
        });

        $(document).ready(function() {
            $('#clientes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('js/validacao.js') }}"></script>
    <script>
        $(document).ready(function() {
          $('.text-truncate').each(function() {
            var text = $(this).text();
            if (text.length > 25) {
              $(this).attr('title', text);
              $(this).on('mouseenter', function() {
                var tooltip = $('<div class="tooltip"></div>');
                tooltip.text(text);
                $(this).append(tooltip);
              });
              $(this).on('mouseleave', function() {
                $('.tooltip').remove();
              });
            }
          });
        });
        </script>
        

</body>

</html>
