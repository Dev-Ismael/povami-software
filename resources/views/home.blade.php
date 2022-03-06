@extends('layouts.app')

@section('content')


    <!------ Header ------>
    <div id="header" class="bg-parallax">
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

    <!------ services ------>
    <div id="services" class="content-padding">

        <h2 class="text-center"> Our Services</h2>
        <div class="content-title-underline"></div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <img src="images/icons/html.png" alt="">
                        </div>
                        <h3> Web Design </h3>
                        <p> Awesome responsive web designs with usability and practicality in mind. Functionally correct standardized development puts out perfect solutions each time, every time.</p>    
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <img src="images/icons/ui.png" alt="">
                        </div>
                        <h3> UX / UI Design </h3>
                        <p> Good user experiences are very important to us for every software we create.
                            By basing our software on human-centered design principles, we ensure your users get the best experience, and you get the best return on investment.</p>    
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <img src="images/icons/graphic-tool.png" alt="">
                        </div>
                        <h3> Graphic Design </h3>
                        <p> Behind every great design, there is a Beautiful Mind… It’s well known that graphic design is the process of visual communication and problem-solving through the use of type, space, image, and color. Here at Povami Software, the main objective of our designs is to understand our clients’ needs in order to deliver the best interactive designs </p>    
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <img src="images/icons/analysis.png" alt="">
                        </div>
                        <h3> Business Analysis </h3>
                        <p> In a world inundated by data, you need fast and reliable data to help you recognize and capitalize on opportunities. With real insight at your fingertips, you can improve engagement levels with your customers, reduce costs, and seize upon exciting new revenue streams. </p>    
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <img src="images/icons/stats.png" alt="">
                        </div>
                        <h3> Digital Marketing </h3>
                        <p> Social media is a part of digital marketing that is used for promoting your brand and increase conversion rate, In Povami Software, we strive to deliver the best Social media services with various new perspectives which suit different types of businesses. </p>    
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <img src="images/icons/website.png" alt="">
                        </div>
                        <h3> Web Development </h3>
                        <p> Leveraging new approaches to web development including progressive web apps, we bring development and architecture ability together to deliver on your business need and maximize delivery speed. </p>    
                    </div>
                </div>





                
            </div>
        </div>

    </div>

    <!------ works ------>
    <div id="works" class="content-padding">

        <h2 class="text-center"> Our Works</h2>
        <div class="content-title-underline"></div>

        <div class="container">
            <div class="row text-center">


                
                <div class="col-md-4 col-sm-6"> 
                    <div class="work-box text-left">
                        <img src="images/works-imgs/img.png" alt="">
                        <p class="site-title"> ahmed.com </p>
                        <p class="site-desc">  Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem  </p>
                        <a href="#" > <i class="fas fa-eye"></i> Live Preview</a>    
                    </div>    
                </div>

                <div class="col-md-4 col-sm-6"> 
                    <div class="work-box text-left">
                        <img src="images/works-imgs/img2.png" alt="">
                        <p class="site-title"> ahmed.com </p>
                        <p class="site-desc">  Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem  </p>
                        <a href="#" > <i class="fas fa-eye"></i> Live Preview</a>    
                    </div>    
                </div>


                <div class="col-md-4 col-sm-6"> 
                    <div class="work-box text-left">
                        <img src="images/works-imgs/img.png" alt="">
                        <p class="site-title"> ahmed.com </p>
                        <p class="site-desc">  Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem  </p>
                        <a href="#" > <i class="fas fa-eye"></i> Live Preview</a>    
                    </div>    
                </div>



            </div>
        </div>

    </div>

    <!------ testmoilas ------>
    <div id="testmoilas" class="content-padding" >

        <h2 class="text-center"> <i class="fa-solid fa-pen-nib"></i> Testmonilas</h2>
        <div class="content-title-underline"></div>

        <section>

            <div class="container">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-caption">
                                <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen. </p> <img src="{{ asset('images/testmonilas/1.jpg') }}"  alt=""> 
                                <div id="image-caption">Nick Doe</div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen.</p>  <img src="{{ asset('images/testmonilas/2.jpg') }}"  alt=""> 
                                <div id="image-caption">Cromption Greves</div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen.</p>  <img src="{{ asset('images/testmonilas/3.jpg') }}"  alt=""> 
                                <div id="image-caption">Harry Mon</div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev"> <i class='fas fa-arrow-left'></i> </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <i class='fas fa-arrow-right'></i> </a>
                </div>
            </div>
            
        </section>
        




    </div>

    <!------ stats ------>
    <div id="stats">
        <div class="container text-center align-middle">
            <div class="row">

                <div class="col-sm-6 col-md-3">
                    <span class="num"> 725 </span>
                    <br>
                    <span class="text"> Clients </span>
                </div>
                <br>
                
                <div class="col-sm-6 col-md-3">
                    <span class="num"> 825 </span>
                    <br>
                    <span class="text"> Projects </span>
                </div>
                <br>

                <div class="col-sm-6 col-md-3">
                    <span class="num"> 126 </span>
                    <br>
                    <span class="text"> Empolyee </span>
                </div>
                <br>

                <div class="col-sm-6 col-md-3">
                    <span class="num"> 3 </span>
                    <br>
                    <span class="text"> Countries </span>
                </div>
                <br>

            </div>
        </div>
    </div>

    <!------ what-wait ------>
    <div id="what-wait" class="content-padding">
        <div class="container">
            <h2 class="text-center">So what are you waiting for !?</h2>
            <div class="content-title-underline"></div>       
            <div class="buttons text-center">
                <a href="#" class="btn btn-primary"> Join Now <i class="fas fa-arrow-right"></i> </a>
                <span>or</span>
                <a class="btn btn-success">Contact Us <i class="fas fa-envelope"></i> </a>
            </div>
        </div>                    
    </div>

    <!------ payments ------>
    <div id="payments" class="col-md-12 text-center content-padding">
        <img src="images/payments/paypal.png" alt="">
        <img src="images/payments/bitcoin.png" alt="">
        <img src="images/payments/payeer.png" alt="">
        <img src="images/payments/skrill.png" alt="">
        <img src="images/payments/western.png" alt="">
        <img src="images/payments/Vodafone-Cash.png" alt="">
    </div>


@endsection
