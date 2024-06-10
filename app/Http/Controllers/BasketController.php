<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class BasketController extends Controller
{
    public function take(Request $request) {


        $products = Product::whereIn('id', $request->products)->get();

        // Log the retrieved products
        Log::info('Retrieved Products: ', $products->toArray());

        return response()->json($products);

    }
}
