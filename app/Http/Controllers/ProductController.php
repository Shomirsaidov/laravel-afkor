<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{


    public function addForm(Request $request) {

        $categories = Category::orderBy('category')->get();
        return view('create', ['categories' => $categories]);

    }

    public function show($id) {

        $product = Product::find($id);
        $comments = Comment::where('product_id', $id)->get();
        $similars = Product::where(function ($query) use ($product) {
                $query->where('category_id', $product->category_id);
            })
            ->where('id', '!=', $product->id)
            ->get();



        if (!$product) {
            abort(404);
        }

        return view('single-product', ['product' => $product, 'comments' => $comments, 'similars' => $similars]);


    }

    public function create(Request $request) {


        // Handle file uploads
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $imagePaths[] = Storage::url($path);
            }
        }


        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'prev_price' => $request->input('prev_price'),
            'quantity' => $request->input('quantity'),
            'images' => json_encode($imagePaths),
            'category_id' => $request->input('category_id'),
            'tags' => $request->input('tags'),
            'brand' => $request->input('brand'),
        ]);


        return redirect()->route('product-form');

    }

    public function showBySection(Request $request, $category, $section) {
        $category_id = Category::select('id')->where('category', $category)->where('section', $section)->get();
        Log::info($category_id);
        $products = Product::whereIn('category_id', $category_id)->get();
        Log::info($products);

        return view('feed',['data'=>$products]);
    }
}
