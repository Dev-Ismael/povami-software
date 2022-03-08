@extends('layouts.app')

@section('content')




    <!------ services ------>
    <div id="services" class="content-padding">

        <h2 class="text-center"> <i class="fa-solid fa-chalkboard-user"></i> Our Services</h2>
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

    <!------ clients ------>
    <div id="clients" class="content-padding">

        <h2 class="text-center"> <i class="fa-solid fa-list-check"></i> Our Clients</h2>
        <div class="content-title-underline"></div>

        <div class="container">
            <div class="row text-center">

                <div id="clients-logo" class="col-md-12 text-center">
                    <img src="{{ asset('images/works/1.png') }}" alt="">
                    <img src="{{ asset('images/works/2.png') }}" alt="">
                    <img src="{{ asset('images/works/3.png') }}" alt="">
                    <img src="{{ asset('images/works/4.png') }}" alt="">
                    <img src="{{ asset('images/works/5.png') }}" alt="">
                    <img src="{{ asset('images/works/6.png') }}" alt="">
                    <img src="{{ asset('images/works/7.png') }}" alt="">
                    <img src="{{ asset('images/works/8.png') }}" alt="">
                    <img src="{{ asset('images/works/9.png') }}" alt="">
                    <img src="{{ asset('images/works/10.png') }}" alt="">
                    <img src="{{ asset('images/works/11.png') }}" alt="">
                    <img src="{{ asset('images/works/12.png') }}" alt="">
                    <img src="{{ asset('images/works/13.png') }}" alt="">
                    <img src="{{ asset('images/works/14.jpg') }}" alt="">
                    <img src="{{ asset('images/works/15.png') }}" alt="">
                </div>



            </div>
        </div>

    </div>

    <!------ testmoilas ------>
    <div id="testmoilas" class="content-padding" >

        <h2 class="text-center"> <i class="fa-solid fa-quote-left"></i> Testmonilas</h2>
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

                <div class="col-sm-6 col-md-2 offset-md-1">
                    <p class="icon"> <i class="fa-solid fa-handshake"></i>   </p>
                    <p class="num"> + <span class="counter"> 458 </span> </p>
                    <p class="text"> Clients </p>
                </div>
                <br>
                
                <div class="col-sm-6 col-md-2">
                    <p class="icon"> <i class="fa-solid fa-list-check"></i>  </p>
                    <p class="num"> + <span class="counter"> 306 </span> </p>
                    <p class="text"> Projects </p>
                </div>
                <br>

                <div class="col-sm-6 col-md-2">
                    <p class="icon">  <i class="fa-solid fa-user-tie"></i>  </p>
                    <p class="num"> +<span class="counter"> 48 </span> </p>
                    <p class="text">  Empolyee </p>
                </div>
                <br>

                <div class="col-sm-6 col-md-2">
                    <p class="icon">  <i class="fa-solid fa-square-share-nodes"></i>  </p>
                    <p class="num"> + <span class="counter"> 500,000 </span>  </p>
                    <p class="text"> Follower </p>
                </div>
                <br>

                <div class="col-sm-6 col-md-2">
                    <p class="icon">  <i class="fa-solid fa-earth-asia"></i>  </p>
                    <p class="num"> + <span class="counter"> 3 </span>  </p>
                    <p class="text"> Countries </p>
                </div>
                <br>


            </div>
        </div>
    </div>


    <!------ Skillset --------->
    <div id="skillset">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-7">
                    <h2>From strategy to deployment and beyond… </h2>
                    <p>Once you conceive an idea, the next step is to find the best technology partner to bring your idea to life. Our team of developers, software architects,
                        project managers and other technicians is equipped with advanced and up-to-date skill sets to cater to specific needs of your project.
                        We are a full-scale software development firm that knows the value of lasting relationships and can combine focused detail-oriented action with long-term strategic thinking.
                    </p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset("images/skillset.png") }}" alt="" class="img-fulid">
                </div>
            </div>
        </div>
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


@endsection
