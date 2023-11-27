@extends('layout.app')

@section('page-title')
    Jobify Welcome Page
@endsection

@section('content')
    <div class="flex justify-center items-center">
            <form class="shadow-lg space-y-2 p-8 grid" action="{{ route('post') }}" method="POST">
                <h1 class="my-4">Leave a feedback about this Jobify !</h1>
                @csrf
                @error('title')
                    <h3 class="text-red-500">{{ $message }}</h3>
                @enderror
                <input placeholder="Title" type="text" class="border-2 p-2 text-md outline-none rounded-md" name="title" value="{{ old('title') }}">
                @error('text')
                    <h3 class="text-red-500">{{ $message }}</h3>
                @enderror
                <textarea placeholder="Feedback text" type="text" class="border-2 p-2 text-md outline-none rounded-md" name="text" value="{{ old('text') }}"></textarea>
                
                <input placeholder="Choose a nick" type="text" class="border-2 p-2 text-md outline-none rounded-md" name="author" value="{{ old('author') }}">
                @error('date')
                    <h3 class="text-red-500">{{ $message }}</h3>
                @enderror
                <input type="date" class="border-2 p-2 text-md outline-none rounded-md" name="date" value="{{ old('date') }}"><br>
               
            
                <button type="submit" class="bg-green-600 w-full p-2 rounded-md text-white">Submit</button>
            </form>
    </div>
@endsection