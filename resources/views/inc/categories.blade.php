<div class="my-16 mt-8">

    <h1 class="text-2xl font-black my-4">Каталог </h1>

    @foreach($categories as $category)
        <a href="{{ '/categories/' . $category->category}}">
            <div class="p-4 shadow-xl border-2 font-bold text-xl mt-4 cursor-pointer hover:shadow rounded-lg">
                <p>{{ $category->category }}</p>
            </div>
        </a>
    @endforeach


</div>