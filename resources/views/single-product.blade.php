@extends('layout.app')

@section('page-title') Купить {{ $product->name }} @endsection

@section('content')

<div>
   






    
        <div class="flex space-x-2 overflow-x-auto snap-x snap-mandatory">
            @if ($product->images)
                @foreach (json_decode($product->images) as $image)
                    <div style="min-width: 200px;" class="flex flex-col justify-center items-center text-center border-4 rounded-xl p-4 cursor-pointer snap-center">
                        <img src="{{ $image }}" alt="Product Image" class="mb-4" width="300">
                    </div>
                @endforeach
            @endif
        </div>
    
















    <h1 class="text-xl">Name: {{ $product->name }}</h1>
    <h1 class="text-xl">Price: {{ $product->price }}</h1>
    <h1 class="text-xl strike">Last price: <s>{{ $product->prev_price }}</s></h1>
    <h1 class="text-xl">Description: {{ $product->description }}</h1>
    <h1 class="text-xl">Left: {{ $product->quantity }}</h1>
    <h1 class="text-xl">Category: {{ $product->category->category . ', ' . $product->category->section . ', ' . $product->category->type }}</h1>
    <input type="hidden" class="prod_id" value="{{ $product->id }}">

    <button id="addBasket" class="w-full border-2 border-blue-800 font-black p-4 text-blue-800 hover:bg-blue-800 hover:text-white mt-4">В корзину</button>

    @if ($comments)
            @foreach ($comments as $comment)
            <div class="p-4 border-2 shadow-md rounded-lg my-2">
                <h1 class="font-black">{{ $comment->author }}</h1>
                <h1>{{ $comment->text }}</h1>
            </div>
            @endforeach
    @endif


    <h1 class="text-xl font-bold my-4">Оставьте отзыв </h1>


    <form action="/comment" method="POST">
        @csrf

        <div class="mb-8">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="author" id="name" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Comment</label>
            <textarea name="text" id="description" rows="4" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
        </div>

        <input type="hidden" name="product_id" value="{{ $product->id }}"  required>


        <div class="mt-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Отправить
            </button>
        </div>


    </form>

    @include('inc.similar')


</div>

<script src="/js/single-product.js"></script>

@endsection
