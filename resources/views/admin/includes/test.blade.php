@extends('layouts.app')

@section('content')
    <br>
    @foreach($leaders as $leader)
	    {{ $leader->zipCode }}
	    has
	    {{ $leader->trackedHours }}
	    tracked
	    <br>
    @endforeach

    <br><br>

 @endsection