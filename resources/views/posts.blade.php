@extends('layout.app')

@section('page-title') Recent Events @endsection

@section('content')

    <div class="space-y-8">
    @foreach($posts as $key => $post)
            <div class="shadow-lg border-2 p-4 rounded-md">
                <div class="flex items-center space-x-2">
                    <div style="width: 40px; height: 40px; background: #cecece"></div>
                    <h3 class="text-blue-800 text-lg">{{ $post->author }}</h3>        
                </div>
                <h2 class="text-center font-bold">{{$post->title}}</h2>
                <p class="text-md mt-2">{{ $post->text }}</p>        
                <p class="text-blue-600 mt-8 text-end">{{ $post->date }}</p>        
            </div>
    @endforeach
    </div>

@endsection