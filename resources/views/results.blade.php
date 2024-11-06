@extends('layout.app')

@section('page-title') Товары по запросу {{ request('query') }} @endsection

@section('content')

    


<div>
    <h1 class="text-xl font-bold ">Вот что у нас есть по вашему запросу {{ request('query') }}</h1>

    <div class="">
        @if(count($products) > 0)
            @foreach($products as $product)
                <div  class="flex flex-col justify-center items-center text-center border-4 rounded-xl p-4 cursor-pointer my-4 snap-center">
                    <div class="flex flex-col items-center">
                        <div class="flex flex-wrap opacity-50 mb-4 space-x-2">
                            @foreach(explode(',',$product->tags) as $tag) 
                            <button class="rounded-full p-2 bg-gray-300  ">{{ $tag }}</button>
                            @endforeach
                        </div>
                        <img src="{{ json_decode($product->images)[0] }}" alt="" width="200">
                        <h1 class="font-bold my-4">{{ $product->name }}</h1>
                        <div class="flex space-x-4 items-center">
                            <h1 class="font-bold text-green-700 my-2 text-xl">{{ $product->price }} c.</h1>
                            @if($product->prev_price > $product->price)
                            <s class="">
                                <h1 class=" font-bold  my-2">{{ $product->prev_price }} c.</h1>
                            </s>
                            @endif
                        </div>
                    </div>
                    <div class="w-full h-full flex items-end">
                            <a href="/product/{{ $product->id }}" class="bg2 text-white p-2 rounded-xl mt-2 w-full">
                                Смотреть
                            </a>
                    </div>
                </div>
            @endforeach
        @else 
            <h1>Поищите что-то другое...</h1>
        @endif
    </div>
</div>







@endsection