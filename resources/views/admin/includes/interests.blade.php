@extends('layouts.app')

@section('content')
    <div class="page-header row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Interests</h1>
            @include('admin.includes.search')
        </div>

        <div class="col-md-3 col-md-offset-1">
            <form action="{{ route('admin.panel.interests.create') }}" method="POST" class="form-inline" style="margin-top: 70px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="" placeholder="Enter Interest"/>
                </div>
                <button type="submit" class="btn btn-success">Create Interest</button>
            </form>
        </div>
    </div>



<div class="row">
    <div class="col-md-2">
        @include('admin.includes.menu')
    </div>

    <div class="col-md-9" "well" style="background-color:Gainsboro;">
        <table class="table table-hover table-condensed table-striped info">
            <thead>
                <tr>
                    <th><a href="{{ route($path='admin.panel.interests', $defaults=['id', $direction]) }}">ID</a></th>
                    <th><a href="{{ route($path='admin.panel.interests', $defaults=['name', $direction]) }}">NAME</a></th>
                </tr>
            </thead>

            <tbody>

            @foreach($interests as $interest)
            <tr>
                <td>{{$interest->id}}</td>
                <td>{{$interest->name}}</td>
                <td class="text-right">
                    <form action="{{ route('admin.panel.interests.destroy', $interest->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">
        {!! $interests->links(); !!}
    </div>
</div>
@endsection