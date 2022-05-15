@extends('layouts.affiliate')
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
                                $dayTerm = $hour > 17 ? 'Evening' : ($hour > 12 ? 'Afternoon' : 'Morning');
                                echo 'Good ' . $dayTerm . '!';
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
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">


                            <a class="nav-link mb-3 p-3 shadow active" id="v-pills-orders-tab" data-toggle="pill"
                                href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                                <i class="fa-solid fa-bars-staggered pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">orders</span>
                            </a>

                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-contracts-tab" data-toggle="pill"
                                href="#v-pills-contracts" role="tab" aria-controls="v-pills-contracts"
                                aria-selected="false">
                                <i class="fa-solid fa-file-signature pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">contracts</span>
                            </a>

                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-credits-tab" data-toggle="pill"
                                href="#v-pills-credits" role="tab" aria-controls="v-pills-credits" aria-selected="false">
                                <i class="fa-solid fa-money-check-dollar pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">Povami Credits</span>
                            </a>


                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-presonal-info-tab" data-toggle="pill"
                                href="#v-pills-presonal-info" role="tab" aria-controls="v-pills-presonal-info"
                                aria-selected="true">
                                <i class="fa fa-user-circle-o mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Personal information</span>
                            </a>


                            <a class="nav-link mb-3 p-3 shadow logout" aria-selected="false" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-door-open pr-2"></i>
                                <span class="font-weight-bold small text-uppercase">logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </div>





                    <!-- Tabs Content -->
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">











                            <!----------- Orders Section------------->
                            <div class="tab-pane fade shadow rounded bg-white show active" id="v-pills-orders"
                                role="tabpanel" aria-labelledby="v-pills-orders-tab">
                                <h4 class="font-italic mb-4">
                                    <i class="fa-solid fa-bars-staggered pr-1"></i>
                                    Orders
                                </h4>
                                <div class="orders-content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading active" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        #1 Collapsible Group Item
                                                        <i class="fa-solid fa-angles-down"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel"
                                                aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                                    keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                    occaecat craft beer farm-to-table, raw denim aesthetic synth
                                                    nesciunt you probably haven't heard of them accusamus labore
                                                    sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                        #2 Collapsible Group Item
                                                        <i class="fa-solid fa-angles-down"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                                aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                                    keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                    occaecat craft beer farm-to-table, raw denim aesthetic synth
                                                    nesciunt you probably haven't heard of them accusamus labore
                                                    sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree">
                                                        #3 Collapsible Group Item
                                                        <i class="fa-solid fa-angles-down"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                                aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                                    keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                    occaecat craft beer farm-to-table, raw denim aesthetic synth
                                                    nesciunt you probably haven't heard of them accusamus labore
                                                    sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


















                        </div>
                    </div>


                </div>
            </div>
        </div>



    </div>
@endsection
