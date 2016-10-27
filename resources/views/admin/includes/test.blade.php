@extends('layouts.app')

@section('content')
    <br>
    @foreach($leaders as $leader)
	    {{ $leader->zipCode }}
	    has
	    {{ $leader->trackedHours }}
	    hours tracked
	    <br>
    @endforeach


    @foreach($volunteers as $volunteer)
	    {{ $volunteer->firstName }}
	    has
	    {{ $volunteer->trackedHours }}
	    hours tracked
	    <br>
    @endforeach

    <br><br>

 @endsection