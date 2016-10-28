@extends('layouts.app')

@section('title')
    home Page
@endsection

@section('head')
    <!-- CSS -->
    <link href="{{ URL::to('css/scrolling-nav.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('content')
    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="intro_container">
            <div class="intro_row">
                <div class="intro_col-lg-12">
                    <h1>Carrot Path</h1>
                    <h3> Whether you're a Voluenteer, Organizer or Local Buisness</h3>
                    <h3>Carrot Path has a route for you!</h3>
                    <a class="btn btn-default page-scroll" href="#about"></a>
                    <h4>Follow the Path to Learn More</h4>
                    <video poster="long.jpg" autoplay="true" loop> 
                        <source src="https://s3.amazonaws.com/distill-videos/videos/processed/34/BetweenTwoTrees-HD.mp4.webm" type="video/webm">
                        <source src="https://s3.amazonaws.com/distill-videos/videos/processed/34/BetweenTwoTrees-HD.mp4-mobile.mp4" type="video/mp4">
                   </video>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <!-- <img src="/images/vol_pic.jpg" alt="picture"/> -->
        <div class="about_container">
            <div class="row">
                <div class="about_col-lg-12">
                    <h1>What We're All About</h1>
                    <h4>We're a platform that connects organizations, voluneteers and local buisnesses to fulfill worthy causes within the community.</h4>
                    <a class="btn btn-default page-scroll about_btn" href="#services"></a>
                    <div class="present">
                         <div>
                             <ul>
                                <h5>Volunteers</h5>
                                 <li>Reason 1</li>
                                 <li>Reason 2</li>
                                 <li>Reason 3</li>
                                 <li>Click Here to Learn More</li>
                             </ul>
                         </div>
                         <span style="margin-left: 15em;"></span>
                         <div style="margin-left: 15em;">       
                             <ul>
                                <h5>Organizations</h5>
                                 <li>Reason 1</li>
                                 <li>Reason 2</li>
                                 <li>Reason 3</li>
                                 <li>Click Here to Learn More</li>
                             </ul>
                         </div>
                         <span style="margin-left: 13em;"></span>
                         <div class="present_bus" style="margin-left: 15em;">
                            <ul>
                                <h5>Businesses</h5>
                                 <li>Reason 1</li>
                                 <li>Reason 2</li>
                                 <li>Reason 3</li>
                                 <li>Click Here to Learn More</li>
                             </ul>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Leader Boards</h1>
                    <a class="btn btn-default page-scroll" href="#contact"></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Your Area</h1>
                    <a class="btn btn-default page-scroll" href="#contacttwo"></a>
                </div>
            </div>
        </div>
    </section>

    <section id="contacttwo" class="contacttwo-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>More Info</h1>
                    <a class="btn btn-default page-scroll" href="#intro"></a>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('script')
    <!-- Scrolling Nav JavaScript -->
    <script src="{{ URL::to('js/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::to('js/scrolling-nav.js') }}"></script>
@endsection
                    