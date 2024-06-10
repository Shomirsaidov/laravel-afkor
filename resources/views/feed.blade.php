@extends('layout.app')

@section('page-title')
    {{ Request::route('category') . ' \ ' . Request::route('section') }}
@endsection

@section('content')


    <div>
        <h1 class="text-xl font-bold my-8">{{ Request::route('category') . ' \ ' . Request::route('section') }}</h1>
        <div class="space-x-2 overflow-x-auto snap-x snap-mandatory">
            @if(count($data) > 0)
                @foreach($data as $product)
                    <div style="min-width: 200px;" class="flex flex-col justify-center items-center text-center border-4 rounded-xl p-4 cursor-pointer snap-center">
                        <div class="flex flex-col items-center">
                            <img src="{{ json_decode($product->images)[0] }}" alt="" width="200">
                            <h1 class="font-bold my-4">{{ $product->name }}</h1>
                            <h1 class="font-bold text-green-700 my-2">${{ $product->price }}</h1>
                        </div>
                        <div class="w-full h-full flex items-end">
                                <a href="/product/{{ $product->id }}" class="bg-blue-800 text-white p-2 rounded-xl mt-2 w-full">
                                    Смотреть
                                </a>
                        </div>
                    </div>
                @endforeach
            @else 
                <h1>Nothing to see</h1>
            @endif
        </div>
    </div>


@endsection