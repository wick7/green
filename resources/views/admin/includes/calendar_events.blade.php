@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1><center>Calendar Events</center></h1>
    </div>

<div class="row">
    <div class="col-md-2">
        @include('admin.includes.menu')
    </div>

    <div class="col-md-9">
        <div class="well" style="background-color:Gainsboro;">
            <table class="table table-hover table-condensed table-striped info">
                <thead>
                    <tr>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['id', $direction]) }}">ID</a></th>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['organization_id', $direction]) }}">ORGANIZATION</a></th>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['title', $direction]) }}">TITLE</a></th>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['start', $direction]) }}">DATE</a></th>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['start', $direction]) }}">START TIME</a></th>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['end', $direction]) }}">END TIME</a></th>
                        <th><a href="{{ route($path='admin.panel.events', $defaults=['max_volunteer', $direction]) }}">MAX # Of VOLUNTEERS</a></th>
                    </tr>
                </thead>

                <tbody>

                @foreach($calendar_events as $calendar_event)
                <tr>
                    <td>{{$calendar_event->id}}</td>
                    <td>{{$calendar_event->organization->organization}}</td>
                    <td>{{$calendar_event->title}}</td>
                    <td>{{ date("d-m-Y",strtotime($calendar_event->start)) }}</td>
                    <td>{{ date("g:i a",strtotime($calendar_event->start)) }}</td>
                    <td>{{ date("g:i a",strtotime($calendar_event->end)) }}</td>
                    <td>{{$calendar_event->max_volunteer}}</td>
                    @if(Auth::guard('admin')->user())
                        <td class="text-right">
                            <a class="btn btn-primary" href="{{ route('calendar_events.show', $calendar_event->id) }}">View</a>
                            <a class="btn btn-warning " href="{{ route('calendar_events.edit', $calendar_event->id) }}">Edit</a>
                            <form action="{{ route('admin.panel.events.destroy', $calendar_event->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                        </td>
                    @endif 
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="text-center">
            {!! $calendar_events->links(); !!}
        </div>
    </div>
</div>

@endsection