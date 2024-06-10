@extends('layout.app')

@section('page-title') {{ Request::route('category') }}  @endsection

@section('content')

    <div>
        @foreach($data as $category)
            <a href="{{ '/categories/' . $category->category . '/' . $category->section}}">
                <div class="p-4 shadow-xl border-2 font-black text-2xl mt-4 cursor-pointer hover:shadow rounded-lg">
                    <p>{{ $category->section }}</p>
                </div>
            </a>
        @endforeach
    </div>


@endsection