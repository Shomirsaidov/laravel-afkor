<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoriesController::class, 'getCategories'])->name('categories');

Route::get('/categories/{category}', [CategoriesController::class, 'getSections']);

Route::get('/categories/{category}/{section}', [ProductController::class, 'showBySection']);

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');

Route::post('/add-product-script', [ProductController::class, 'create'])->name('create-product');

Route::post('/comment', [CommentController::class, 'create']);

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/basket', [BasketController::class, 'take'])->name('basket');

Route::post('/order', [OrderController::class, 'make'])->name('order');

Route::get('/orders', [OrderController::class, 'index'])->name('take-orders');

Route::get('/thankyou', function() {
    return view('thankyou');
})->name('after-shop');

Route::get('/profile', function() {
    if(Auth::check()) {
        return view('profile');
    }
    return view('auth.login');
})->name('profile');

Route::get('/add-product', [ProductController::class, 'addForm'])->name('product-form');

Route::get('/basket', function() {
    return view('basket');
})->name('basket-page');

Route::get('/register', function() {
    return view('auth.register');
})->name('auth.register');

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
