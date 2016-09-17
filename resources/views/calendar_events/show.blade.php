@extends('layout')

@section('content')
    <div class="page-header">
        <h1>CalendarEvents / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$calendar_event->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$calendar_event->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="start">START</label>
                     <p class="form-control-static">{{$calendar_event->start}}</p>
                </div>
                    <div class="form-group">
                     <label for="end">END</label>
                     <p class="form-control-static">{{$calendar_event->end}}</p>
                </div>
                    <div class="form-group">
                     <label for="is_all_day">IS_ALL_DAY</label>
                     <p class="form-control-static">{{$calendar_event->is_all_day}}</p>
                </div>
                    <div class="form-group">
                     <label for="background_color">BACKGROUND_COLOR</label>
                     <p class="form-control-static">{{$calendar_event->background_color}}</p>
                </div>
            </form>


            
            <a class="btn btn-default" href="{{ route('calendar_events.index') }}">Back</a>
            @if(Auth::guard('organization')->user())
            <a class="btn btn-warning" href="{{ route('calendar_events.edit', $calendar_event->id) }}">Edit</a>
            <form action="#/$calendar_event->id" method="DELETE" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><button class="btn btn-danger" type="submit">Delete</button></form>
            @endif
            @if(Auth::guard('volunteer')->user())
                @if($exists)
                    <a class="btn btn-primary" href="{{ route('calendar_events.register', $calendar_event->id) }}">Unregister</a> 
                @else
                    <a class="btn btn-primary" href="{{ route('calendar_events.register', $calendar_event->id) }}">Register</a>
                @endif
            @endif
        </div>

    </div>

<div class="row">
        <div class="col-md-12">

            <form action="{{ route('post.store') }}" method="POST" id="postForm">
               

                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value=""/>
                </div>

                <div class="form-group">
                     <label for="title">TITLE</label>
                     <textarea rows="4" cols="50" name="conversation" form="postForm">
Enter post here...</textarea>>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="calendar_id" value="{{ $calendar_event->id }}">
                </div>  
            <button class="btn btn-primary" type="submit" >Create</button>
            
            </form>
        </div>
    </div>
   
    @foreach($post as $po)
    @if ($po->calendar_id == $calendar_event->id)
    <div class="container">
    @if ($po->users_post_type == "App\Organization")  
     @foreach($Org as $O)  
    @if ($po->users_post_id == $O->id ) 
  <h2>{{ $O->organization }}</h2>
  @endif
  @endforeach
  <div class="panel panel-default">
    <div class="panel-heading">{{$po->title}}</div>
    <div class="panel-body">{{$po->conversation}}</div>
  </div>
@if ($organization)
  @if ($po->users_post_id == $organization->id)
  <form action="{{ route('post.destroy', $po->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
  @endif
@endif
</div>
  @else 
  @foreach($Vol as $User)  
    @if ($po->users_post_id == $User->id ) 
  <h2>{{ $User->firstName }}</h2>
  @endif
  @endforeach
  <div class="panel panel-default">
    <div class="panel-heading">{{$po->title}}</div>
    <div class="panel-body">{{$po->conversation}}</div>
  </div>
  @if ($volunteer)
  @if ($po->users_post_id == $volunteer->id)
  <form action="{{ route('post.destroy', $po->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
</div>
@endif
  @endif
  @endif
@endif
 @endforeach
@endsection
