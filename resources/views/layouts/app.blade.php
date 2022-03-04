<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!------- CSRF Token ------->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!------- Title ------->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!------- IE Compatibility Meta ------->
        <meta http-equiv="X-UA-Compatibale" content="IE-=edge">

        <!------- Theme Color meta ------->
        <meta name="theme-color" content="#ffffff"> 

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <!------- Google Font ------->
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

        <!------- FontAwesome  ------->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        
        <!------- StyleSheet ------->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        
    </head>
    <body>
        <div id="app">

            Hello
            @yield('content')

        </div>

    








        

        <!-- JQUERY Framwork-->
        <script src="{{ asset('js/jquery.js') }} "></script>

        <!-- WOW Framwork-->
        <script src="{{ asset('js/wow.min.js') }} "></script>

        <!-- bootstrap Framwork-->
        <script src="{{ asset('js/bootstrap.js') }} "></script>

        <!-- magnific-popup Framwork-->
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }} "></script>

        <!-- owl-carousel Framwork-->
        <script src="{{ asset('js/owl.carousel.min.js') }} "></script>

        <!-- JQUERY Framwork-->
        <script src="{{ asset('js/custom.js') }} "></script>




        
    </body>
</html>
