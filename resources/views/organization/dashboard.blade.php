@extends('layouts.app')

@section('head')
    <link href="{{ URL::to('css/OrgDash.css') }}" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css" media="print"/>
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    @if (Storage::disk('local')->has('organization-' . $user->firstName . '-' . $user->id . '.jpg'))
        <div id="toparea" > </div>
        <div id="info" class="container">
        <div class="col-md-6">
            <img id="userImage" class="img-responsive img-circle" src="{{ route('organization.account.image', ['filename' => 'organization-' . $user->firstName . '-' . $user->id . '.jpg']) }}" alt="">
            Organization: {{ $user->organization }} <br>
            Name: {{ $user->firstName }} {{ $user->lastName }} <br>
            Area: {{ $user->zipCode }}
        </div>

    @else
        <p>Image not found!</p>
        Organization: {{ $user->organization }} <br>
        Name: {{ $user->firstName }} {{ $user->lastName }} <br>
        Area: {{ $user->zipCode }}
    @endif
    
    <div class="col-md-6">
        {!! $calendar->calendar() !!}
    </div>
@endsection

@section('script')
{!! $calendar->script() !!}
@endsection 

