@extends('layouts.app')
@section ('headsection')
<link rel="stylesheet" href="/css/Homestyle.css">
@endsection 
@section('content')
<div class="container">
    <div class="row row-centered">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Mission Statement</div>

                <div class="panel-body">
                    Voluback is an ambitious company attempting to promote suntanable volunteering through merchant based incentives.
                </div>
            </div>
        </div>
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

<p> Check out our events here <a href="{{ url('/calendar_events/index') }}">Events!</a>

@extends ('includes.footer')
  
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="/js/fliptiles.js"></script>

@endsection
