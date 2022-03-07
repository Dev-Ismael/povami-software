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
        <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>

        
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
                    <a class="navbar-brand" href="{{ route('home') }}"> <img src="images/icons/Logo2.png" alt=""> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ route('home') }}"> <i class="fa-solid fa-house-chimney"></i>  Home  </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="#"> <i class="fa-solid fa-circle-question"></i> About US  </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="#"> <i class="fa-solid fa-file-lines"></i> Our Works   </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="#"> <i class="fa-solid fa-sitemap"></i> Afilliate  </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"> <i class="fa-solid fa-right-to-bracket"></i> {{ __('Login') }} </a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}"> <i class="fa-solid fa-user-plus"></i> {{ __('Register') }} </a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>


            <!----- Add/remove Home header ----->
            @if(request()->routeIs('home'))
                <div id="home-header" class="bg-parallax">
                    <div class="container">
                        <div class="col-md-5">
                            <div class="info">
                                <h1> Hey There, Welcome to Povami Software! <i class="fa-solid fa-face-grin-wide" style="color:#ffe817"></i> </h1>
                                <h5> Design & development Agency in the world </h5>
                                <p>
                                    With us, you will receive the best services in the short time
                                </p>
                                <a href="#" class="btn btn-success"> <i class="fa-solid fa-file-lines"></i> View Works </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="header" class="bg-parallax"></div> 
            @endif



            <!---- Content ---->
            @yield('content')


            <!---- Add/Remove footer from register pages ---->
            @if( preg_match('(login|register)', url()->current()) !== 1 )

                <!---- Footer ---->
                <div id="footer"  class="bg-parallax">

                    <div class="container">
                        <div class="row ">

                            <div class="col-md-4">
                                <div class="box">
                                    <h2> Povami Software</h2>
                                    <p class="company-content"> 
                                        At our software development company, we create many projects for international corporations, small businesses and other organisations with an aim to open up new possibilities for expansion, 
                                        process automatisation, and continuous improvement. We are a team of experienced developers, creators, designers and project managers you can rely on.
                                    </p>    
                                </div>
                            </div>

                            <div class="col-md-4 text-md-center">
                                <div class="box">
                                    <h2> Company </h2>
                                    <ul class="list-unstyled ">
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" href="{{ route('home') }}"> <i class="fa-solid fa-house-chimney"></i>  Home  </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" href="#"> <i class="fa-solid fa-circle-question"></i> About US  </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" href="#"> <i class="fa-solid fa-file-lines"></i> Our Works   </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" href="#"> <i class="fa-solid fa-sitemap"></i> Afilliate  </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box">
                                    <h2> Social Media </h2>
                                    <p>You can contact with us in our social media to get services</p>
                                    <ul class="list-unstyled social-media">
                                        <li> <a href="https://www.facebook.com/PovamiSoftware" target="_blank"> <i class="fab fa-facebook-square"></i>  </a> </li>
                                        <li> <a href="https://wa.link/rtau8b" target="_blank" > <i class="fa-brands fa-whatsapp-square"></i>  </a> </li>
                                        <li> <a href="https://www.youtube.com/channel/UCr9CUvVt3nqTxwZTT82EjhA" target="_blank" > <i class="fab fa-youtube-square"></i>  </a> </li>
                                        <li> <a href="mailto:povami.software@gmail.com"> <i class="fas fa-envelope-square"></i> </a> </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>

                    

                </div>


            @endif

            <!---- CopyRight ---->
            <div id="copyright">
                Copyright ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                All rights reserved <i class="fas fa-heart"></i>                    
                Povami Software 
            </div>








        </div>

    










        <!-- JQUERY Framwork-->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <!-- bootstrap Framwork-->
        <script src="{{ asset('js/bootstrap.js') }} "></script>

        <!-- owl-carousel Framwork-->
        <script src="{{ asset('js/owl.carousel.min.js') }} "></script>

        <!-- countup -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }} "></script>
        <!-- JQUERY Framwork-->
        <script src="{{ asset('js/custom.js') }} "></script>




        
    </body>
</html>
