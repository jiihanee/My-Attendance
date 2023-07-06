@extends('Master.layout')

@section('title')
My Attendance
@endsection

@section('content1')

<style>
    body {
        background-image: url("background1.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<img src="{{asset('logo.png')}}" style="margin-top :-300px">

<a href="{{ route('login')}}" class="btn btn-success btn-lg btn-block" style="margin-top: 450px; margin-left:-180px"> Se connecter </a>

@endsection