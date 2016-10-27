@extends('layout')

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scrolling Nav - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- Custom CSS -->
    <script href="js/app.js" ></script>
    <script href="js/bootsrap.min.js" ></script>
    <script href="js/jquery.js" ></script>
    <script href="js/scrolling-nav.js" ></script>

    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jaldi|Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Heebo:100" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>@yield('title')</title>


<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
@endsection

@section('content')
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top" style="color:orange">CP</a>
            </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about" style="color:orange">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services" style="color:orange">Leader Boards</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact" style="color:orange">Your Area</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contacttwo" style="color:orange">More Info</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#" style="color:orange">Sign-In/Sign-up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 

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
<!--                     <img class= "logo" src="node_modules/bootstrap-sass/assets/images/down.png"></img>
 -->                   <video poster="long.jpg" autoplay="true" loop> 
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

@endsection




<!-- <p><strong>Usage Instructions:</strong> Make sure to include the <code>scrolling-nav.js</code>, <code>jquery.easing.min.js</code>, and <code>scrolling-nav.css</code> files. To make a link smooth scroll to another section on the page, give the link the <code>.page-scroll</code> class and set the link target to a corresponding ID on the page.</p>
 -->

 <!-- <img src="{{ URL::to('public/images/vol_pic.jpg')}}" alt="sample picture"/> -->
                    <!-- <img src="public/images/vol_pic.jpg" alt="picture"/> -->
                    