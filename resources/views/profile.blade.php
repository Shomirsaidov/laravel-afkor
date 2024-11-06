@extends('layout.app')

@section('page-title') Профиль {{ Auth::user()->name }} @endsection

@section('content')

    <div class=" p-4 pt-0 rounded-xl shadow-lg">

    @if(Auth::check())

        <div class="flex items-center space-x-4">
            <div class="border-2 rounded-full p-8 bg4 text1 flex justify-center items-center font-black" style="width: 50px; height: 50px;">
                {{ substr(Auth::user()->name, 0 ,2)}}
            </div>
        
            <p class="text-xl">Салом, {{ Auth::user()->name }} !</p>
        </div>

        @if(Auth::user()->role == 'admin')
            <a href="/add-product">
                <button class="bg23 w-full p-4 mt-8 rounded-xl text-white font-bold">Добавить продукт</button>
            </a>
            <a href="/orders">
                <button class="bg23 w-full p-4 mt-2 rounded-xl text-white font-bold">Заказы</button>
            </a>
        @endif


        <div class="my-8">
            <a href="/login">
                <div class="text-xl mb-4">Сменить аккаунт</div>
            </a>
            <a href="/register">
                <div class="text-xl mb-4">Создать новый</div>
            </a>
            <a href="/logout">
                <div class=" text-xl">Выйти</div>
            </a>
        </div>


        <div>
            <h1 class="text-xl font-black mt-8">Ваши заказы</h1>
            <div>
                <div class="flex space-x-2 overflow-x-auto snap-x snap-mandatory">
                    @if($orders && count($orders) > 0)
                        @foreach($orders as $order)
                            <div style="min-width: 300px;" class="flex flex-col justify-center items-center text-center border-4 rounded-xl p-4 cursor-pointer my-4 snap-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex flex-wrap opacity-50 mb-4 space-x-2">
                                        @foreach(explode(',',$order->product->tags) as $tag) 
                                        <button class="rounded-full p-2 bg-gray-300  ">{{ $tag }}</button>
                                        @endforeach
                                    </div>
                                    <img src="{{ json_decode($order->product->images)[0] }}" alt="" width="200">
                                    <h1 class="font-bold my-4">{{ $order->product->name }}</h1>
                                    <div class="flex space-x-4 items-center">
                                        <h1 class="font-bold text-green-700 my-2 text-xl">${{ $order->product->price }}</h1>
                                        @if($order->product->prev_price > $order->product->price)
                                        <s class="">
                                            <h1 class=" font-bold  my-2">${{ $order->product->prev_price }}</h1>
                                        </s>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full h-full flex items-end">
                                        <a href="/product/{{ $order->product->id }}" class="bg2 text-white p-2 rounded-xl mt-2 w-full">
                                            Смотреть
                                        </a>
                                </div>
                            </div>
                        @endforeach
                    @else 
                            <p>
                                Пока нет заказов...
                            </p>
                    @endif
                </div>
            </div>
            



        </div>
        
    @else
        <p>Please log in.</p>
    @endif

    </div>

@endsection