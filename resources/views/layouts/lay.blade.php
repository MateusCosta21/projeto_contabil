<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
*{
    background: #D9D9D9;
}
.card-header {
    background-color: #243452;
    color: #fff;
}

.bg-info{
    background-color: #243452 !important;
    height: 100vh;
}

#titulo{
    color:#fff;
    background: none;
}

.btn-primary {
    background-color: #428bca;
    border-color: #428bca;
}



.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    background-color: #3071a9;
    border-color: #285e8e;
}

.card {
    margin-top: 50px;
    border: none;
    width: 80%;
}

.form-control {
    border-radius: 0;
    border-color: #d2d6de;
}

.card-body {
    padding: 30px;
}

.btn-link {
    color: #428bca;
}

.btn-wid{
    width: 100%;
    background-color:#243452;
    border:none;
}

.btn-link:hover {
    text-decoration: underline;
}
.navbar-nav li:hover {
    background-color: #428bca;
}
    </style>
</head>
<body>


    <div id="app">
    
        <main>
            @yield('content')
        </main>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
