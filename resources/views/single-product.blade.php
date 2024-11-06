@extends('layout.app')

@section('page-title') Купить {{ $product->name }} @endsection

@section('content')

<div>
   






    
        <div class="flex space-x-2 overflow-x-auto snap-x snap-mandatory">
            @if ($product->images)
                @foreach (json_decode($product->images) as $image)
                    <div style="min-width: 200px;" class="flex flex-col justify-center items-center text-center border-4 rounded-xl p-4 cursor-pointer snap-center">
                        <a href="{{ $image }}">
                            <img src="{{ $image }}" alt="Product Image" class="mb-4" max-width="300" style="max-height: 250px;">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    
















    <div class="info mt-8">
        <div class="flex flex-wrap justify-between border-b-2 p-2">
            <h1 class="text-xl font-bold">{{ $product->name }}</h1>
        </div>
        <div class="flex justify-between border-b-2 p-2">
            <h1 class="text-xl">Цена </h1>
            <h1 class="text-xl font-bold">{{ $product->price }} c.</h1>
        </div>
        @if($product->prev_price > $product->price)
            <div class="flex justify-between border-b-2 p-2">
                <h1 class="text-xl">Прежняя цена </h1>
                <h1 class="text-xl font-bold">{{ $product->prev_price }} c.</h1>
            </div>
        @endif
        <div class="space-y-2  border-b-2 p-2">
            <h1 class="text-xl">Описание </h1>
            <h1 class="text-md p-2 bg4 rounded ">{{ $product->description }}</h1>
        </div>
        <div class="flex justify-between border-b-2 p-2">
            <h1 class="text-xl">Осталось </h1>
            <h1 class="text-xl font-bold">{{ $product->quantity }}</h1>
        </div>
        <div class="flex justify-between border-b-2 p-2">
            <h1 class="text-xl">Бренд </h1>
            <h1 class="text-xl font-bold">{{ $product->brand }}</h1>
        </div>
        <div class="flex justify-between border-b-2 p-2">
            <h1 class="text-xl">Понравилось </h1>
            <h1 class="text-xl font-bold">{{ count($product->likes) }}</h1>
        </div>
        <div class="space-y-2 border-b-2 p-2">
            <h1 class="text-xl">Категория </h1>
            <h1 class="text-md font-bold">{{ $product->category->section . ', ' . $product->category->type }}</h1>
        </div>
    </div>

    
    <input type="hidden" class="prod_id" value="{{ $product->id }}">

    @if($users_role == 'admin') 
        <a href="{{ '/edit/' . $product->id }}">
            <button class="w-full border-2 bg-green-500 font-black p-4 text-white hover:bg-green-600 hover:text-white mt-4">Изменить</button>
        </a>
    @endif

    <div class="flex space-x-2  mt-4">
        <button id="addBasket" class="w-full bg12 text-white font-black p-4">В корзину</button>
        <button id="addLike" class="border-2 px-4">
            @if(count($isLiked) > 0) 
            <img id="dislike" src="/assets/heart-fill.svg" width="40" alt="">
            @else 
            <img id="like" src="/assets/heart-disabled.svg" width="40" alt="">
            @endif
        </button>
    </div>

    <div class="my-8">
        @if ($comments)
            @foreach ($comments as $comment)
            <div class="p-4 border-2 shadow-md rounded-lg my-2">
                <h1 class="font-black">{{ $comment->author }}</h1>
                <h1>{{ $comment->text }}</h1>
            </div>
            @endforeach
        @endif
    </div>


    <h1 class="text-xl font-bold my-4">Оставьте отзыв </h1>


    <form action="/comment" method="POST" class="mb-8">
        @csrf

        <div class="mb-8">
            <label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
            <input type="text" name="author" id="name" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Отзыв</label>
            <textarea name="text" id="description" rows="4" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
        </div>

        <input type="hidden" name="product_id" value="{{ $product->id }}"  required>


        <div class="mt-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg3 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Отправить
            </button>
        </div>


    </form>

    @include('inc.similar')
    @include('inc.new')
    @include('inc.sales')


</div>


<script src="/js/jquery.js"></script>
<script src="/js/single-product.js"></script>
<script>




    let loggedIn = '{{ Auth::check() }}'

    
    let liked = false

    let likeBtn = document.querySelector('#like')



   
        likeBtn.onclick = function() {

            if(loggedIn !== '1') {
                location.href = '/register'
            }


            $.ajax({
                    url: '{{ route("addLike") }}',
                    type: 'POST',
                    data: {
                        product_id: '{{ $product->id }}',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#like').hide()
                        if(!liked) {
                            $('#addLike').append('<img id="dislike" src="/assets/heart-fill.svg" width="40" alt="">')
                        }

                        
                    },
                    error: function(xhr) {
                    }
                });


        }
    



    document.getElementById('addBasket').onclick = function() {
        let productId = document.querySelector('.prod_id').value    
        
        if(localStorage.getItem('sewingTJ')) {
            console.log('want to add !')
            let newBasket = JSON.parse(localStorage.getItem('sewingTJ'))
            newBasket.push(productId)
            localStorage.setItem('sewingTJ', JSON.stringify(newBasket))
            document.getElementById('addBasket').textContent = 'Добавлено'
            document.getElementById('addBasket').style.background = '#071952'
        } else {
            localStorage.setItem('sewingTJ', JSON.stringify([productId]))
            document.getElementById('addBasket').textContent = 'Добавлено'
            document.getElementById('addBasket').style.background = '#071952'
        }
    }
        
        
    










</script>

@endsection
