@extends('layouts.app')
@section('headsection')
<link href="{{ URL::to('css/OrgDash.css') }}" rel="stylesheet" />

<link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css" media="print"/>



@endsection
@section('title')
    Dashboard
@endsection

@section('content')
   
        
            {{--<header><h3>Creative Space</h3></header>--}}
       
        
            
                @if (Storage::disk('local')->has('organization-' . $user->firstName . '-' . $user->id . '.jpg'))
                    
                            <div id="toparea" >
                            <div id="info" class="container">
                            <div class="col-md-6">
                            <img id="userImage" class="img-responsive img-circle" src="{{ route('organization.account.image', ['filename' => 'organization-' . $user->firstName . '-' . $user->id . '.jpg']) }}" alt="">
                            
                        
                    
                @else
                    
                            <p>Image not found!</p>
                        
                @endif
            
                Organization: {{ $user->organization }} <br>
                Name: {{ $user->firstName }} {{ $user->lastName }} <br>
                Area: {{ $user->zipCode }}
                </div>
                <div class="col-md-6">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
            </div><!--
       


               --><div id="bottomarea">
                    <header><h3>About Us</h3></header>
                    
                        {{ $user->about }}

@if ($calendar_events->organization_id = $user->id)

@forelse($calendar_events as $calendar_event)                  
<div class="container">
  <h2>{{ $calendar_event->title }}</h2>
 <table class="table table-hover">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach($calendar_event->volunteers as $volunteer)
      <tr>
        <td>{{ $volunteer->firstName }}</td>
        <td>{{ $volunteer->lastName }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  @empty
<p>No Events</p>
@endforelse
@endif
</div>

   
    
    </div>
@endsection
@section('script')
{!! $calendar->script() !!}
@endsection 

