@extends('layouts.app')

@section('title')
    Panel
@endsection

@section('content')

@include('admin.includes.volunteers')
<hr>
@include('admin.includes.calendar_events')
<hr>
@include('admin.includes.interests')
@endsection



