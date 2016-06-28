@extends('layouts.app')
@section('navbar')
<li><a href="{{ url('/calendar_events/create') }}">Add an Event</a></li>
<li><a href="{{ route('calendar_events.index') }}">View Events</a></li>
@endsection 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Organization Dashboard</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection