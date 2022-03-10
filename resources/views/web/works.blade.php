@extends('layouts.web')

@section('content')

    <div id="works-page">

        <div id="works-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h4> <i class="fa-solid fa-file-lines"></i> Our Works </h4>
                        <p> 
                            At our software development company, we create many projects for international corporations, small businesses
                            and other organisations with an aim to open up new possibilities for expansion, process automatisation,
                            and continuous improvement. We are a team of experienced developers, creators,
                            designers and project managers you can rely on.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div id="works-page-content">
            <div class="container">
                <div class="row">
                    <div class="">
                        <p> 
                            AT OUR SOFTWARE DEVELOPMENT COMPANY, WE CREATE MANY PROJECTS FOR INTERNATIONAL CORPORATIONS, 
                            SMALL BUSINESSES AND OTHER ORGANISATIONS WITH AN AIM TO OPEN UP NEW POSSIBILITIES FOR EXPANSION,
                            PROCESS AUTOMATISATION, AND CONTINUOUS IMPROVEMENT. WE ARE A TEAM OF EXPERIENCED DEVELOPERS, CREATORS,
                            DESIGNERS AND PROJECT MANAGERS YOU CAN RELY ON.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div id="works-examples">


            <div class="container">

                                
                                
                <!-- Bordered tabs-->
                <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
                    <li class="nav-item flex-sm-fill">
                        <a id="nav-web-tab" data-toggle="tab" href="#nav-web" role="tab" aria-controls="nav-web" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">   <i class="fa-solid fa-desktop"></i> Web  </a>
                    </li>
                    <li class="nav-item flex-sm-fill">
                        <a id="nav-app-tab" data-toggle="tab" href="#nav-app" role="tab" aria-controls="nav-app" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">  <i class="fa-solid fa-mobile-screen-button"></i> Apps </a>
                    </li>
                    <li class="nav-item flex-sm-fill">
                        <a id="nav-ux-tab" data-toggle="tab" href="#nav-ux" role="tab" aria-controls="nav-ux" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">   <i class="fa-solid fa-cube"></i> UX/UI  </a>
                    </li>
                </ul>


                <div id="myTab1Content" class="tab-content">

                    <!------- Web Work ----->
                    <div id="nav-web" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                        <div id="web-works">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="overlay">
                                                <p> G-Market.com</p>
                                            </div>
                                            <img src="images/works-imgs/img2.png">
                                            <div class="box-content">
                                                <h3 class="title">G-Market.com</h3>
                                                <span class="post">Web designer</span>
                                                <a class="btn" href=""> <i class="fa fa-eye"></i> Visit </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="overlay">
                                                <p> G-Market.com</p>
                                            </div>
                                            <img src="images/works-imgs/img.png">
                                            <div class="box-content">
                                                <h3 class="title">G-Market.com</h3>
                                                <span class="post">Web designer</span>
                                                <a class="btn" href=""> <i class="fa fa-eye"></i> Visit </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="overlay">
                                                <p> G-Market.com</p>
                                            </div>
                                            <img src="images/works-imgs/img2.png">
                                            <div class="box-content">
                                                <h3 class="title">G-Market.com</h3>
                                                <span class="post">Web designer</span>
                                                <a class="btn" href=""> <i class="fa fa-eye"></i> Visit </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> 
                    </div>

                    <!------- App Work ----->
                    <div id="nav-app" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="overlay">
                                            <p> G-Market.com</p>
                                        </div>
                                        <img src="images/works-imgs/img2.png">
                                        <div class="box-content">
                                            <h3 class="title">G-Market.com</h3>
                                            <span class="post">Web designer</span>
                                            <a class="btn" href=""> <i class="fa fa-eye"></i> Visit </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="overlay">
                                            <p> G-Market.com</p>
                                        </div>
                                        <img src="images/works-imgs/img.png">
                                        <div class="box-content">
                                            <h3 class="title">G-Market.com</h3>
                                            <span class="post">Web designer</span>
                                            <a class="btn" href=""> <i class="fa fa-eye"></i> Visit </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="overlay">
                                            <p> G-Market.com</p>
                                        </div>
                                        <img src="images/works-imgs/img2.png">
                                        <div class="box-content">
                                            <h3 class="title">G-Market.com</h3>
                                            <span class="post">Web designer</span>
                                            <a class="btn" href=""> <i class="fa fa-eye"></i> Visit </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!------- UX Work ----->
                    <div id="nav-ux" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                        <p class="leade font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>


                </div>



            </div>

            


        </div>

    </div>

@endsection