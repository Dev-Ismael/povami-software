@extends('layouts.affiliate')
@section('content')
    <div id="dashboard-page">


        <!----- Header ----->
        <div id="header" class="bg-parallax">
            <div class="overlay"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10 offset-md-1">
                        <h3>
                            Hi, {{ Str::ucfirst(Auth::guard('affiliator')->user()->name) }} <br>
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
                        <div class="nav flex-column nav-pills nacustom" id="tab" role="tablist" aria-orientation="vertical">


                            <a class="nav-link mb-3 p-3 shadow active" id="statistics-tab" data-toggle="pill"
                                href="#statistics" role="tab" aria-controls="statistics" aria-selected="false">
                                <i class="fa-solid fa-gauge pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">Statistics</span>
                            </a>

                            <a class="nav-link mb-3 p-3 shadow" id="tools-tab" data-toggle="pill" href="#tools" role="tab"
                                aria-controls="tools" aria-selected="false">
                                <i class="fa-solid fa-screwdriver-wrench pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">My Tools</span>
                            </a>

                            <a class="nav-link mb-3 p-3 shadow" id="withdrawals-tab" data-toggle="pill" href="#withdrawals"
                                role="tab" aria-controls="withdrawals" aria-selected="false">
                                <i class="fa-solid fa-money-bill-1 pr-1"></i>
                                <span class="font-weight-bold small text-uppercase">withdrawals Money</span>
                            </a>


                            <a class="nav-link mb-3 p-3 shadow" id="presonal-info-tab" data-toggle="pill"
                                href="#presonal-info" role="tab" aria-controls="presonal-info" aria-selected="true">
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




                    <!------------- css Style --------------->
                    <link rel="stylesheet" type="text/css"
                        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
                    <link rel="stylesheet" type="text/css"
                        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
                    <link rel="stylesheet" type="text/css"
                        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">




                    <!-- Tabs Content -->
                    <div class="col-md-9">
                        <div class="tab-content" id="tabContent">










                            <!----------- statistics Section ------------->
                            <div class="tab-pane fade shadow rounded bg-white show active" id="statistics" role="tabpanel"
                                aria-labelledby="statistics-tab">
                                <h4 class="font-italic mb-3">
                                    <i class="fa-solid fa-gauge"></i>
                                    Statistics
                                </h4>
                                <div class="statistics-content ">

                                    <div class="affiliator-stats row">
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3 class="blue">156</h3>
                                                                <span>Affiliator</span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i
                                                                    class="icon-user-follow blue font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3 class="pink">64</h3>
                                                                <span>Clients</span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i
                                                                    class="icon-user-following pink font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3 class="success">08.00$</h3>
                                                                <span> Balance </span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i class="icon-wallet success font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!---------------- Affiliators Table ------------------>
                                    <div class="affiliator-list">
                                        <h5 class="font-italic mt-5 mb-2">
                                            <i class="fa-solid fa-list-check"></i>
                                            Your Affiliators
                                        </h5>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">@email</th>
                                                    <th scope="col">Join at</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>




                                    <!---------------- Clients Table ------------------>
                                    <div class="client-list">
                                        <h5 class="font-italic mt-5 mb-2">
                                            <i class="fa-solid fa-list-check"></i>
                                            Your Clients
                                        </h5>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Client email</th>
                                                    <th scope="col">Project name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>




                                </div>
                            </div>














                            <!----------- statistics Section ------------->
                            <div class="tab-pane fade shadow rounded bg-white" id="tools" role="tabpanel"
                                aria-labelledby="tools-tab">
                                <h4 class="font-italic mb-3">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    My Tools
                                </h4>

                                <div class="coupon-container pt-3">
                                    <ul>
                                        <li>
                                            Share your coupon code with clients this will provide clients more discounts at
                                            our services ,
                                            you’ll be more likely to convince your target audience to make a purchase.
                                        </li>
                                        <li>
                                            We will know that the client is recommended for our services through you by
                                            using the discount coupon,
                                            so be sure to provide the client with the coupon so that you get your percentage
                                            of the profits
                                        </li>
                                        <li>
                                            To know more info about commission system <a href="#">Click Here</a>
                                        </li>
                                    </ul>
                                    <div class="container">
                                        <div class="card">
                                            <div class="main">
                                                <div class="co-img">
                                                    <img src="{{ asset('images/favicon.png') }}" alt="povami-icon" />
                                                </div>
                                                <div class="vertical"></div>
                                                <div class="content">
                                                    <h2>POVAMI SOFTWARE</h2>
                                                    <h1>7% <span>Coupon</span></h1>
                                                    <p>For every complete service</p>
                                                </div>
                                            </div>
                                            <div class="copy-button">
                                                <input id="copyvalue" type="text" readonly value="GOFREE" />
                                                <div class="copybtn">
                                                    <button>
                                                        <i class="fa-solid fa-copy pr-1"></i>
                                                        <span> COPY </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="referral-container  pt-3">
                                    <ul>
                                        <li>
                                            Also you can use referral link to invite other affiliators like you for signup
                                            at POVAMI affiliator system and
                                            work in marketing and attracting clients...
                                            This will make you have many affiliators in your network
                                        </li>
                                        <li>
                                            Affiliators in your network will working to get clients and without any
                                            interference from you in the process you will get 1% for every complete service
                                        </li>
                                    </ul>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            value="http://povamisoftware.co/affiliate/dashboard#v-pills-tools" readonly />
                                        <div class="input-group-append copybtn">
                                            <button class="input-group-text d-flex justify-content-center">
                                                <i class="fa-solid fa-copy pr-1"></i>
                                                <span> COPY </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

















                            <!----------- Withdrawals Section ------------->
                            <div class="tab-pane fade shadow rounded bg-white" id="withdrawals" role="tabpanel"
                                aria-labelledby="withdrawals-tab">
                                <h4 class="font-italic mb-3">
                                    <i class="fa-solid fa-money-bill-1 pr-1"></i>
                                    Withdrawals Money
                                </h4>

                                <!---------------- withdrawals Table ------------------>
                                <div class="affiliator-list">
                                    <div class="table-header  mt-5 mb-2 d-flex">
                                        <h5 class="font-italic">
                                            <i class="fa-solid fa-list-check"></i>
                                            Your withdrawal requests
                                        </h5>
                                        <button class="btn purple ml-auto mb-2" data-toggle="modal" data-target="#createRequestModal">
                                            <i class="fa-solid fa-paper-plane"></i> Request
                                        </button>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>20.03$</td>
                                                <td>Paypal</td>
                                                <td>
                                                    <span class="badge badge-success p-2"> <i
                                                            class="fa-solid fa-check pr-1"></i> Sent </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>12.35$</td>
                                                <td>Payeer</td>
                                                <td>
                                                    <span class="badge badge-warning p-2"> <i
                                                            class="fa-solid fa-spinner pr-1"></i> Pending </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>10$</td>
                                                <td>Vodafone</td>
                                                <td>
                                                    <span class="badge badge-danger p-2"> <i
                                                            class="fa-solid fa-x pr-1"></i> Failed</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!---------------- Request withdrawals Modal ------------------>
                                <div class="modal fade" id="createRequestModal" tabindex="-1" role="dialog"
                                    aria-labelledby="createRequestLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createRequestLabel"> <i
                                                        class="fa-solid fa-plus-circle"></i>
                                                    Create
                                                    Request Withdrawals </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="request-withdrawal-form" enctype="multipart/form-data">

                                                    <label for="amount"> <i class="fa-solid fa-money-bill-1 pr-1"></i> Amount..</label>
                                                    <input type="text" class="form-control" value="{{ Auth::guard('affiliator')->user()->balance }}$" disabled/>
                                                    <small class="form-text text-danger amount"> </small>
                                                    <br>

                                                    <!----------- Payment Method -------------->
                                                    <label for="payment_method"> <i class="fa-solid fa-money-check"></i> Payment Method..</label>
                                                    <select id="myDropdown" name="payment_method">
                                                        <option dd-option-value="0" selected> Choose Payment Method... </option>
                                                        @foreach ($payment_methods as $payment_method)
                                                            <option value="{{ $payment_method->id }}" data-imagesrc="{{ asset('images/payment_methods/' . $payment_method->img) }}"> 
                                                                {{ ucfirst($payment_method->name) }} 
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="hidCflag" id="hidCflag" value="" />

                                                    <small class="form-text text-danger payment_method"> </small>
                                                    <hr>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="create-request-withdrawal" class="btn purple"> <i
                                                        class="fa-solid fa-check"></i> Confirm </button>
                                                <button type="button" class="btn cancle" data-dismiss="modal"> <i
                                                        class="fa-solid fa-xmark"></i> Close </button>
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
