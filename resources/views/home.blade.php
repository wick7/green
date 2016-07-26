@extends('layouts.app')
@section ('headsection')
<link rel="stylesheet" href="/css/Homestyle.css">
 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
@endsection 
@section('content')

<div class="container carosel-fix">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="/images/Couch.png" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="/images/outside.png" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="/images/postcard.png" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="/images/signs.png" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div id= "box1"class="well box transform">
                <h3>Volunteer<h3>
                <p id="volunteer1">Click to find why you should join?</p>
                <ul class="reasons" id="volunteer2">
                    <li>reason 1</li>
                    <li>reason 2</li>
                    <li>reason 3</li>
                    <li><a href="#">Join us today!</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div id= "box2" class="well box transform">
                <h3>Non Profit Organization</h3>
                <p id="organization1">Click to find why you should join?</p>
                <ul class="reasons" id="organization2">
                    <li>reason 1</li>
                    <li>reason 2</li>
                    <li>reason 3</li>
                    <li>Click to Join us today!</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div id= "box3" class="well box transform">
                <h2>Merchant<h2>
                <p id="merchant1">Click to find why you should join?</p>
                <ul class="reasons" id="merchant2">
                    <li>reason 1</li>
                    <li>reason 2</li>
                    <li>reason 3</li>
                    <li>Join us today!</li>
                </ul>
            </div> 
        </div>
    </div>
</div>



<p> Check out our events here <a href="{{ Route ('Calender.index') }}">Events!</a></p>


  
@endsection
@section('script')
<script src="/js/fliptiles.js"></script>
<script src="/js/carousel.js"></script>

@endsection
