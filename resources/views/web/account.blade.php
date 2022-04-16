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









                            <!--------------- Contracts Section ---------------->
                            <div class="tab-pane fade shadow rounded bg-white" id="v-pills-contracts" role="tabpanel"
                                aria-labelledby="v-pills-contracts-tab">
                                @if ($contracts->isEmpty())
                                    <div class="no_data">
                                        <div class="container text-center">
                                            <img src="{{ asset('images/contract.png') }}" class="img-fluid"
                                                alt="no_data">
                                            <p>No contracts yet! ... Contact now with povami support to create one!</p>
                                        </div>
                                    </div>
                                @else
                                    <h4 class="font-italic mb-4">
                                        <i class="fa-solid fa-file-signature pr-1"></i>
                                        Contracts
                                    </h4>
                                    <div class="contracts-content">
                                        <div class="panel-group" id="accordion" role="tablist"
                                            aria-multiselectable="true">
                                            @php $arraycount = count($contracts) @endphp
                                            @foreach ($contracts as $key => $contract)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab"
                                                        id="{{ 'heading' . $key }}">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                                href="#{{ 'collapse' . $key }}" aria-expanded="true"
                                                                aria-controls="{{ 'collapse' . $key }}">
                                                                #{{ $arraycount - $key  }} {{ $contract->title }}
                                                                <i class="fa-solid fa-angles-down"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="{{ 'collapse' . $key }}"
                                                        class="panel-collapse collapse in" role="tabpanel"
                                                        aria-labelledby="{{ 'heading' . $key }}">
                                                        <div class="panel-body">
                                                            <div class="content">
                                                                <span class="title"> <i
                                                                        class="fa-solid fa-align-left"></i> Contract Details :</span>
                                                                <span class="text"> {{ $contract->content }} </span>
                                                            </div>
                                                            <div class="price">
                                                                <span class="title"> <i  class="fa-solid fa-sack-dollar"></i> Project Price :</span>
                                                                <span class="text"> {{ $contract->price }}$ </span>
                                                            </div>
                                                            <div class="deadline">
                                                                <span class="custom-calnder">

                                                                        @php

                                                                            $date = str_replace("/","-",$contract->deadline);  // Replace "/"  ==> '-'
                                                                            $date = strtotime($date);  // Convert string to time
                                                                            $day_weekly   = date('l', $date);
                                                                            $day   = date('jS', $date);
                                                                            $month = date('F', $date);
                                                                            $year  = date('Y', $date);
                                                                            
                                                                        @endphp
                                                                    <section class="ftco-section">
                                                                        <h6 class="text-center"> 
                                                                            <span class="title"> <i class="fa-solid fa-clock"></i> Project Deadline </span>
                                                                        </h6>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-10 col-md-8 col-lg-6">
                                                                                <div class="today">
                                                                                    <div class="today-piece  top  day"> {{ $day_weekly }} </div>
                                                                                    <div class="today-piece  middle  month"> {{ $month }} </div>
                                                                                    <div class="today-piece  middle  date"> {{ $day }} </div>
                                                                                    <div class="today-piece  bottom  year"> {{ $year }} </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>

                                                                </span>

                                                                
                                                            </div>
                                                            <div class="text-right mt-2 mb-2">
                                                                <button href="#" class="btn purple ">
                                                                    <i class="fa-solid fa-check"></i> Accept Contract
                                                                </button>
                                                                <button href="#" class="btn cancle ">
                                                                    <i class="fa-solid fa-xmark"></i> Cancle
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                            </div>






                            <!--------------- Povami Credits Section ---------------->
                            <div class="tab-pane fade shadow rounded bg-white" id="v-pills-credits" role="tabpanel"
                                aria-labelledby="v-pills-credits-tab">
                                <h4 class="font-italic mb-4">
                                    <i class="fa-solid fa-money-check-dollar pr-1"></i>
                                    Povami Credits
                                </h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est laborum.</p>
                            </div>







                            <!----------- Personal information Section ------------->
                            <div class="tab-pane fade shadow rounded bg-white presonal-info" id="v-pills-presonal-info"
                                role="tabpanel" aria-labelledby="v-pills-presonal-info-tab">
                                <h4 class="font-italic mb-4">
                                    <i class="fa fa-user-circle-o mr-2" aria-hidden="true"></i>
                                    Personal information
                                </h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 form-group text-left">
                                            <label for="firstName" class="text-black"> <i
                                                    class="fa-solid fa-file-signature"></i> First Name</label>
                                            <input type="text" class="form-control" id="firstName"
                                                placeholder="Type First Name...">
                                        </div>
                                        <div class="col-md-6 form-group text-left">
                                            <label for="lastName" class="text-black"> <i
                                                    class="fa-solid fa-file-signature"></i> Last Name</label>
                                            <input type="text" class="form-control" id="lastName"
                                                placeholder="Type Last Name...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group text-left">
                                            <label for="phone" class="text-black"> <i
                                                    class="fa-solid fa-phone-volume"></i> Phone </label>
                                            <input type="text" class="form-control" id="phone"
                                                placeholder="Type Phone Number...">
                                        </div>
                                        <div class="col-md-6 form-group text-left">
                                            <label for="phone_2" class="text-black"> <i
                                                    class="fa-solid fa-phone-volume"></i> Second Phone (optional) </label>
                                            <input type="text" class="form-control" id="phone_2"
                                                placeholder="Type Phone Number...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group text-left">
                                            <label for="facebook" class="text-black"> <i
                                                    class="fa-brands fa-facebook-square"></i> Facebook Profile </label>
                                            <input type="text" class="form-control" id="facebook"
                                                placeholder="Type Facebook Profile Link...">
                                        </div>
                                        <div class="col-md-12 form-group text-left">
                                            <label for="twitter" class="text-black"> <i
                                                    class="fa-brands fa-twitter-square"></i> Twitter Profile </label>
                                            <input type="text" class="form-control" id="twitter"
                                                placeholder="Type Twitter Profile Link...">
                                        </div>
                                        <div class="col-md-12 form-group text-left">
                                            <label for="instagram" class="text-black"> <i
                                                    class="fa-brands fa-instagram-square"></i> Instagram Profile </label>
                                            <input type="text" class="form-control" id="instagram"
                                                placeholder="Type Instagram Profile Link...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group text-left">
                                            <label for="country" class="text-black"> <i
                                                    class="fa-solid fa-earth-africa"></i> Country </label>
                                            <select id="country" class="form-control" name="country">
                                                <option value="0" selected="selected"> Choose Your Country... </option>
                                                <option value="Afganistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bonaire">Bonaire</option>
                                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Canary Islands">Canary Islands</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Channel Islands">Channel Islands</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Island">Cocos Island</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote DIvoire">Cote DIvoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaco">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Ter">French Southern Ter</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Great Britain">Great Britain</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="India">India</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea Sout">Korea South</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Midway Islands">Midway Islands</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Nambia">Nambia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                <option value="Nevis">Nevis</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau Island">Palau Island</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Phillipines">Philippines</option>
                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="St Barthelemy">St Barthelemy</option>
                                                <option value="St Eustatius">St Eustatius</option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="St Maarten">St Maarten</option>
                                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                <option value="Saipan">Saipan</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa American">Samoa American</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Tahiti">Tahiti</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America</option>
                                                <option value="Uraguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City State">Vatican City State</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                <option value="Wake Island">Wake Island</option>
                                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zaire">Zaire</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group text-left">
                                            <label for="city" class="text-black"> <i class="fa-solid fa-city"></i>
                                                City
                                            </label>
                                            <input type="text" class="form-control" id="city"
                                                placeholder="Type Your Located City...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group text-left">
                                            <label for="address" class="text-black"> <i
                                                    class="fa-solid fa-location-dot"></i> Address </label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="Type Address Details...">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-right"><button class="btn purple profile-button" type="button">
                                            <i class="fa-solid fa-floppy-disk"></i> Save Profile</button></div>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>






    </div>
@endsection
