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

        <!------- FontAwesome  ------->
        <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>

        
        <!------- StyleSheet ------->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">


            <!---- Content ---->
            @yield('content')









        </div>

    










        <!-- JQUERY Framwork-->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <!-- bootstrap Framwork-->
        <script src="{{ asset('js/bootstrap.js') }} "></script>

        <!-- countup -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }} "></script>
        
        <!-- JQUERY Framwork-->
        <script src="{{ asset('js/custom.js') }} "></script>


        

        
    </body>
</html>