<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/favoritos.js') }}" defer></script>
    <script src="{{ asset('js/formatacao.js') }}" defer></script>
    <script src="{{ asset('js/utils.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/bb3315e9fa.js" crossorigin="anonymous"></script>

    <style type="text/css">

        @font-face {
            font-family: "Abalone";
            src: url("fonte/AbaloneSmile.woff2");
        }

    </style>

</head>
<body>
    @yield('conteudo')
</body>
</html>






