@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1><center>Organizations</center></h1>
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
                        <th><a href="{{ route($path='admin.panel.organizations', $defaults=['id', $direction]) }}">ID</a></th>
                        <th><a href="{{ route($path='admin.panel.organizations', $defaults=['organization', $direction]) }}">ORGANIZATION</a></th>
                        <th><a href="{{ route($path='admin.panel.organizations', $defaults=['email', $direction]) }}">EMAIL</a></th>
                        <th><a href="{{ route($path='admin.panel.organizations', $defaults=['firstName', $direction]) }}">FIRST NAME</a></th>
                        <th><a href="{{ route($path='admin.panel.organizations', $defaults=['lastName', $direction]) }}">LAST NAME</a></th>
                        <th><a href="{{ route($path='admin.panel.organizations', $defaults=['zipCode', $direction]) }}">ZIP CODE</a></th>
                    </tr>
                </thead>

                <tbody>

                @foreach($organizations as $organization)
                <tr>
                    <td>{{$organization->id}}</td>
                    <td>{{$organization->organization}}</td>
                    <td>{{$organization->email}}</td>
                    <td>{{$organization->firstName}}</td>
                    <td>{{$organization->lastName}}</td>
                    <td>{{$organization->zipCode}}</td>
                    <td>{{$organization->trackedHours}}</td>
                    <td class="text-right">
                        <form action="{{ route('admin.panel.organizations.destroy', $organization->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        
        <div class="text-center">
        {!! $organizations->links(); !!}
        </div>

    </div>
</div>

@endsection