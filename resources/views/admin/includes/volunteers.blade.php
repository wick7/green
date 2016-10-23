@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1><center>Volunteers</center></h1>
    </div>


<div class="row">
    <div class="col-md-2">
        @include('admin.includes.menu')
    </div>

    <div class="col-md-9">
        <div class="well" style="background-color:Gainsboro;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><a href="{{ route($path='admin.panel.volunteers', $defaults=['id', $direction]) }}">ID</a></th>
                        <th><a href="{{ route($path='admin.panel.volunteers', $defaults=['email', $direction]) }}">EMAIL</a></th>
                        <th><a href="{{ route($path='admin.panel.volunteers', $defaults=['firstName', $direction]) }}">FIRST NAME</a></th>
                        <th><a href="{{ route($path='admin.panel.volunteers', $defaults=['lastName', $direction]) }}">LAST NAME</a></th>
                        <th><a href="{{ route($path='admin.panel.volunteers', $defaults=['zipCode', $direction]) }}">ZIP CODE</a></th>
                        <th><a href="{{ route($path='admin.panel.volunteers', $defaults=['trackedHours', $direction]) }}">VOLUNTEER HOURS</a></th>
                    </tr>
                </thead>

                <tbody>

                @foreach($volunteers as $volunteer)
                <tr>
                    <td>{{$volunteer->id}}</td>
                    <td>{{$volunteer->email}}</td>
                    <td>{{$volunteer->firstName}}</td>
                    <td>{{$volunteer->lastName}}</td>
                    <td>{{$volunteer->zipCode}}</td>
                    <td>{{$volunteer->trackedHours}}</td>
                    <td class="text-right">
                        <form action="{{ route('admin.panel.volunteers.destroy', $volunteer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="text-center">
            {!! $volunteers->links(); !!}
        </div>

    </div>
</div>

@endsection
