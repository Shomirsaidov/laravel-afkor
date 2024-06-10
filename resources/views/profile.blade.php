@extends('layout.app')

@section('page-title') Профиль {{ Auth::user()->name }} @endsection

@section('content')

    <div class=" p-4 border-4 rounded-xl mt-16 shadow-lg">

    @if(Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <h1>{{ Auth::user()->tel }}</h1>
        <h1>{{ Auth::user()->email }}</h1>
        <h1>{{ Auth::user()->role }}</h1>
    @else
        <p>Please log in.</p>
    @endif

    </div>

@endsection