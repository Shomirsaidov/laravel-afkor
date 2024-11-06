<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        $categories = Category::select('category')->distinct()->get();

        $new_prods = Product::where('tags', 'like', '%новинка%')->inRandomOrder()->get();
        $sales = Product::where('tags', 'like', '%распродажа%')->inRandomOrder()->get();
        $top = Product::where('tags', 'like', '%топпродаж%')
                    ->orWhere('tags', 'like', '%топ%')
                    ->inRandomOrder()
                    ->get();


        return view('home', ['categories'=>$categories, 'news'=>$new_prods, 'sales'=>$sales,'top'=>$top]);
    }

}
