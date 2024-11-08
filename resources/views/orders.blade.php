@extends('layout.app')

@section('page-title') Последние заказы @endsection

@section('content')

    <div>
        <h1 class="text-2xl font-bold mt-4">Последние заказы</h1>
        @if(count($orders) > 0)
            @foreach($orders as $order)
                <div class="shadow-md border-2 p-4 my-4 space-y-2">
                    <h1>{{ $order->name }}</h1>
                    <h1>{{ $order->address }}</h1>
                    <h1>{{ $order->tel }}</h1>
                    <h1>{{ $order->product_name }}</h1>
                    <h1>Цена : {{ $order->price }}</h1>
                    <h1>{{ $order->created_at }}</h1>
                </div>
            @endforeach
        @else
            <h1 class="mt-4">Пока пусто !</h1>
        @endif
    </div> 

@endsection