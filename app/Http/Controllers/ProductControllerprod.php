<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function addForm(Request $request) {

        $categories = Category::orderBy('category')->get();
        return view('create', ['categories' => $categories]);

    }

    public function editForm(Request $request, $id) {
        $categories = Category::orderBy('category')->get();
        $product = Product::where('id', $id)->first();
        return view('edit', ['product'=>$product, 'categories'=>$categories]);
    }

    public function show($id) {

        $product = Product::find($id);
        $comments = Comment::where('product_id', $id)->get();
        
        $similars = Product::where(function ($query) use ($product) {
                $query->where('category_id', $product->category_id);
            })
            ->where('id', '!=', $product->id)
            ->get();

        $new_prods = Product::where('tags', 'like', '%новинка%')->inRandomOrder()->get();
        $sales = Product::where('tags', 'like', '%распродажа%')->inRandomOrder()->get();

        $users_role = 'user';
        $user_id = 809809890;
        if(Auth::check()) {
            $users_role = Auth::user()->role;
            $user_id = Auth::user()->id;
        }

        $isLiked = Like::where('user_id', $user_id)->where('product_id', $id)->get();

        if (!$product) {
            abort(404);
        }

        return view('single-product', ['product' => $product, 'comments' => $comments, 'similars' => $similars, 'users_role'=>$users_role, 'isLiked'=>$isLiked]);


    }

    public function create(Request $request) {


        // Handle file uploads
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $filename = basename($path);
                // Manually construct the URL using your custom base path
                $customBasePath = '/src/storage/app/public/images/';
                $imagePaths[] = $customBasePath . $filename;
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

    public function edit(Request $request) {
        $id = $request->input('product_id');
        // Find the product by ID
        $product = Product::findOrFail($id);
    
        // Handle file uploads
        $imagePaths = json_decode($product->images, true) ?? [];
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $filename = basename($path);
                // Manually construct the URL using your custom base path
                $customBasePath = '/src/storage/app/public/images/';
                $imagePaths[] = $customBasePath . $filename;
            }
        }
    
        // Update product with new data
        $product->update([
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
    
        return redirect()->route('product', ['id' => $product->id]);    
    }
    

    public function showBySection(Request $request, $category, $section) {
        $category_id = Category::select('id')->where('category', $category)->where('section', $section)->get();
        Log::info($category_id);
        $products = Product::whereIn('category_id', $category_id)->get();
        Log::info($products);

        return view('feed',['data'=>$products]);
    }

    public function addLike(Request $request) {
        if(Auth::check()) {
            Like::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id
            ]);
    
            return response()->json(['status'=>'success']);
        } 

        abort(401, 'Not authorized');
        
    }

    public function search(Request $request) {

        $query = $request->input('query');

        $products = Product::where('name', 'like', '%'.$query.'%')
                           ->orWhere('brand', 'like', '%'.$query.'%')
                           ->orWhere('tags', 'like', '%'.$query.'%')
                           ->orWhere('description', 'like', '%'.$query.'%')
                           ->orWhereHas('category', function ($queryBuilder) use ($query) {
                               $queryBuilder->where('section', 'like', '%'.$query.'%')
                                            ->orWhere('type', 'like', '%'.$query.'%')
                                            ->orWhere('category', 'like', '%'.$query.'%');
                           })
                           ->get();

        return view('results', ['products'=>$products]);
        
    }

    public function liked(Request $request) {
     
        $userId = Auth::id();

        // Fetch all favorite products of the current user
        $favoriteProducts = Product::whereHas('likes', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('liked', ['products'=>$favoriteProducts]);


    }


}
