@extends('layouts.app')

@section('content')
    {!! $calendar->calendar() !!}
@stop

@section('script')
    {!! $calendar->script() !!}
@stop