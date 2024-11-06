@extends('layout.app')

@section('page-title') SewingTJ @endsection

@section('content')

   <div class="">
    @include('inc.search')
    @include('inc.new')
    @include('inc.categories')
    @include('inc.sales')
    @include('inc.top')
</div>

@endsection