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


            <!---- Navbar ---->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#"> <img src="images/icons/Logo2.png" alt=""> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link" href="#">Home  </a>
                            <a class="nav-item nav-link" href="#">Services  </a>
                            <a class="nav-item nav-link" href="#"> Works  </a>
                            <a class="nav-item nav-link" href="#">Testmonilas  </a>
                            <a class="nav-item nav-link" href="#">Afilliate </a>
                        </div>
                    </div>
                </div>
            </nav>


            <!---- Content ---->
            @yield('content')



            <!---- Footer ---->
            <div id="footer"  class="bg-parallax">

                <div class="container">
                    <div class="row ">

                        <div class="col-md-4">
                            <div class="box">
                                <h3> Povami Software</h3>
                                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti quo aperiam ratione excepturi voluptatibus asperiores sequi eos nesciunt aliquam illum. Rerum est iure dolor ratione harum id quaerat voluptatum enim? </p>    
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="box">
                                <h3> Company </h3>
                                <ul class="list-unstyled">
                                    <li> <a href="#"> Home </a> </li>
                                    <li> <a href="#"> Services </a> </li>
                                    <li> <a href="#"> Works </a> </li>
                                    <li> <a href="#"> Testmonilas </a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <h3> Social Media </h3>
                                <p>You can contact with us in our social media to get services</p>
                                <ul class="list-unstyled social-media">
                                    <li> <a href="#"> <i class="fab fa-facebook-square"></i>  </a> </li>
                                    <li> <a href="#"> <i class="fab fa-twitter-square"></i>  </a> </li>
                                    <li> <a href="#"> <i class="fab fa-youtube-square"></i>  </a> </li>
                                    <li> <a href="#"> <i class="fas fa-envelope-square"></i>  </a> </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

                

            </div>
            <!---- CopyRight ---->
            <div id="copyright">
                All Right Reversed &copy; 2020 - Powerd By <i class="fas fa-heart"></i> Povami Software 
            </div>








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
