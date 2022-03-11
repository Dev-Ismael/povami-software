@extends('layouts.web')
@section('content')


    <div id="account-page">


        <!----- Header ----->
        <div id="header" class="bg-parallax">
            <div class="overlay"></div>   
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10 offset-md-1">
                        <h3> 
                            Hi, {{ Str::ucfirst(Auth::user()->name) }} <br>
                            @php
                                $hour = date('H');
                                $dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");
                                echo "Good " . $dayTerm . "!";
                            @endphp
                            <i class="fa-solid fa-face-grin-wide" style="color:#ffe817"></i>
                        </h3>
                    </div>
                </div>
            </div>
        </div> 



        <!------- Vertical Tabs --------->
        <div id="vertical-tabs" class="content-padding">
            <div class="container">
                <div class="row">

                    <!----------- Tabs nav ---------->
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            
        
                            <a class="nav-link mb-3 p-3 shadow active" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                                <i class="fa-solid fa-bars-staggered pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">orders</span>
                            </a>
        
                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-contracts-tab" data-toggle="pill" href="#v-pills-contracts" role="tab" aria-controls="v-pills-contracts" aria-selected="false">
                                <i class="fa-solid fa-file-signature pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">contracts</span>
                            </a>
        
                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-credits-tab" data-toggle="pill" href="#v-pills-credits" role="tab" aria-controls="v-pills-credits" aria-selected="false">
                                <i class="fa-solid fa-money-check-dollar pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">Povami Credits</span>
                            </a>
        
                            
                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-presonal-info-tab" data-toggle="pill" href="#v-pills-presonal-info" role="tab" aria-controls="v-pills-presonal-info" aria-selected="true">
                                <i class="fa fa-user-circle-o mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Personal information</span>
                            </a>
        
        
                            <a class="nav-link mb-3 p-3 shadow logout" aria-selected="false">
                                <i class="fa-solid fa-door-open pr-2"></i>
                                <span class="font-weight-bold small text-uppercase">logout</span>
                            </a>

                        </div>
                    </div>
        
        
                    <!-- Tabs content -->
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                            
                            <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                                <h4 class="font-italic mb-4">Orders</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-contracts" role="tabpanel" aria-labelledby="v-pills-contracts-tab">
                                <h4 class="font-italic mb-4">Contracts</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            
                            
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-credits" role="tabpanel" aria-labelledby="v-pills-credits-tab">
                                <h4 class="font-italic mb-4">Povami Credits</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>

                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-presonal-info" role="tabpanel" aria-labelledby="v-pills-presonal-info-tab">
                                <h4 class="font-italic mb-4">Personal information</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>


                        </div>
                    </div>
        
        
                </div>
            </div>
        </div>





        
    </div>


@endsection