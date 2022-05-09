<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!------- CSRF Token ------->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!------- Title ------->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!------- IE Compatibility Meta ------->
        <meta http-equiv="X-UA-Compatibale" content="IE-=edge">

        <!------- Responsive Meta ------------->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <div id="app" class="web-view">


            <!---- Navbar ---->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"> <span>MENU</span> <i class="fa-solid fa-bars-staggered pr-1"></i> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ route('home') }}"> <i class="fa-solid fa-house-chimney"></i>  Home  </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ route('about') }}"> <i class="fa-solid fa-circle-question"></i> About Us  </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link" href="{{ route('works') }}"> <i class="fa-solid fa-file-lines"></i> Our Works   </a>
                            </li>

                            @guest
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('login') }}"> <i class="fa-solid fa-right-to-bracket"></i> Login </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('account') }}"> <i class="fa-solid fa-user"></i> Profile </a>
                                </li>
                                @if( Auth::user()->role === '1' )
                                    <li class="nav-item">
                                        <a class="nav-item nav-link" href="{{ route('dashboard') }}"  > <i class="fa-solid fa-gauge"></i> Dashboard </a>
                                    </li>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>


            <!---- Content ---->
            @yield('content')


            <!---- Add/Remove footer from register pages ---->
            @if( preg_match('(login|register|verify|reset)', url()->current()) !== 1 )

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
                                            <a class="nav-item nav-link" href="{{ route('about') }}"> <i class="fa-solid fa-circle-question"></i> About Us  </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" href="{{ route('works') }}"> <i class="fa-solid fa-file-lines"></i> Our Works   </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link" href="{{ route('affiliate.overview') }}" style="display: inline"> <i class="fa-solid fa-diagram-project"></i> Affiliate Marketing   </a> <span>new</span>
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


            <!-- Absolute Icons -->
            <section id="absolute-icons">
                <div class="arrow-icon">
                    <i class="fas fa-arrow-alt-circle-up" ></i>
                </div>
                <div class="contact-icons">
                    <a href="https://wa.link/rtau8b" target="_blank">
                        <img src="{{ asset("images/icons/whatsapp.png") }}" alt="whatsapp">
                    </a>
                    <a href="https://www.facebook.com/PovamiSoftware" target="_blank">
                        <img src="{{ asset("images/icons/facebook.png") }}" alt="whatsapp">
                    </a>
                </div>
            </section>








        </div>










        <!-- App JS -->
        <script src="{{ asset('js/app.js') }} "></script>



    </body>
</html>
