@extends('layout.app')

@section('page-title') Изменение товара @endsection


@section('content')



        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Изменение товара</h2>
            <form action="/edit-product-script" method="POST" enctype="multipart/form-data" class="space-y-4">
                <!-- CSRF Token (for Laravel) -->
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id" >
                <!-- Name -->
                <div class="mb-8">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input value="{{ $product->name }}" type="text" name="name" id="name" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $product->description }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input value="{{ $product->price }}" type="number" name="price" id="price" step="0.01" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <!-- Previous Price -->
                <div class="mb-4">
                    <label for="prev_price" class="block text-sm font-medium text-gray-700">Previous Price</label>
                    <input value="{{ $product->prev_price }}"  type="number" name="prev_price" id="prev_price" step="0.01" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input value="{{ $product->quantity }}"  type="number" name="quantity" id="quantity" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                    <input type="file" name="images[]" id="images" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
                </div>
                

                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($categories as $category)
                            <option
                                @if($category->id == $product->category_id)
                                    selected
                                @endif
                                value="{{ $category->id }}">{{ $category->category . ', ' . $category->section . ', ' . $category->type }}</option>
                        @endforeach
                    </select>
                </div>

                

                <!-- Type -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tags</label>
                    <input value="{{ $product->tags }}" type="text" name="tags" id="type" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <!-- Brand -->
                <div class="mb-4">
                    <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                    <input value="{{ $product->brand }}" type="text" name="brand" id="brand" class="mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>



                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Изменить
                    </button>
                </div>
            </form>
        </div>


@endsection