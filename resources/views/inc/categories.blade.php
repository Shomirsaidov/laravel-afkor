<div>

    @foreach($categories as $category)
        <a href="{{ '/categories/' . $category->category}}">
            <div class="p-4 shadow-xl border-2 font-black text-2xl mt-4 cursor-pointer hover:shadow rounded-lg">
                <p>{{ $category->category }}</p>
            </div>
        </a>
    @endforeach


</div>