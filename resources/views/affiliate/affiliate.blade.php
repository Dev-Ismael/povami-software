@extends('layouts.affiliate')
@section('content')


    <div id="affiliate-page">




        <!----- Header ----->
        <div id="header" class="bg-parallax">
            <div class="overlay"></div>
            <div class="affiliate-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h3> <i class="fa-solid fa-diagram-project"></i>  Povami Associates - Povami’s affiliate marketing program </h3>
                            <p>
                                Welcome to one of the largest affiliate marketing programs in the world. The Povami Associates Program helps content creators, publishers and bloggers monetize their traffic. With our services and programs available on Povami, associates use easy link-building tools to direct their audience to their recommendations, and earn from qualifying purchases and programs.
                            </p>
                            <a href="#" class="btn btn-success"> BECOME AN AFFILIATE <i class="fa-solid fa-right-to-bracket"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!---------- How It Works ----------->
        <div id="how-it-works" class="content-padding">
            <div class="container text-center">
                <h2 class="pb-2"> HOW DOES IT WORKS? </h2>
                <div class="content-title-underline center"></div>
                <div class="row ">
                    <div class="col-md-4">
                        <div class="box">
                            <h1> <i class="fa-solid fa-envelope-open-text"></i> </h1>
                            <h4> Sigup </h4>
                            <h4 class="num"><i class="fa-solid fa-1"></i></h4>
                            <p> Join tens of thousands of creators, publishers and bloggers who are earning with the Povami Associates Program. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <h1> <i class="fa-solid fa-volume-high"></i> </h1>
                            <h4> Advertise </h4>
                            <h4 class="num"> <i class="fa-solid fa-2"></i> </h4>
                            <p> Share our services with your audience. We have customized linking tools for large publishers, individual bloggers and social media influencers. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <h1> <i class="fa-solid fa-money-check-dollar"></i> </h1>
                            <h4> Earn </h4>
                            <h4 class="num"> <i class="fa-solid fa-3"></i> </h4>
                            <p> Earn up to 10% in associate commissions from qualifying purchases and programs. Our competitive conversion rates help maximize earnings. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!---------- FAQ ----------->
        <div id="faq" class="content-padding">
            <div class="container">
                <h2>Frequently Asked Questions </h2>
                <div class="content-title-underline left"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>How does the Associates Program work?</h4>
                        <p>
                            You can share services and available programs on Povami with your audience through customized linking tools and earn money on qualifying purchases and customer actions like signing up for a free trial program.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h4>How do I earn in this program? </h4>
                        <p>
                            You earn from qualifying purchases and programs through the traffic you drive to Povami. Commission income for qualifying purchases and programs differ based on product category.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h4>How do I qualify for this program?</h4>
                        <p>
                            Bloggers, publishers and content creators with a qualifying website or mobile app can participate in this program. Learn more.
                            If you're an influencer with an established social media following.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h4>How do I sign up to the program? </h4>
                        <p>
                            We will review your application and approve it if you meet the qualifying criteria.
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <!--------- Recommend -------->
        <div id="recommend">
            <div class="container">
                <div class="box">
                    <div class="row align-items-center h-100">
                        <div class="col-md-4 logo text-center">
                            <img src="{{ asset('images/logo_purple.png') }}" alt="">
                        </div>
                        <div class="col-md-8">
                            <h2> Recommend Services. Earn Commissions. </h2>
                            @guest
                                <a href="#" class="btn purple">Join Now!</a>

                            @else
                                <a href="#" class="btn purple">Join Now!</a>

                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
