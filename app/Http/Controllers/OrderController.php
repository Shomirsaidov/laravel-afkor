<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function index() {
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name as product_name', 'products.description as product_description', 'products.price as product_price')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('orders', ['orders'=>$orders]);
    }


    public function make(Request $request) {

        // Log the entire request data for debugging
        Log::info('Request data: ', $request->all());

        // Extract personal data
        $personalData = $request->data['personal_data'];
        $products = $request->data['products'];

        foreach ($products as $product) {
            // Create an order for each product
            Order::create([
                'name' => $personalData['name'],
                'address' => $personalData['address'],
                'tel' => $personalData['tel'],
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'status' => 'pending'
            ]);
        }

        return response()->json(['message' => 'Order created successfully!'], 201);
    }
}
