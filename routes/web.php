<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('register');
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/posts', [PostController::class, 'recent'])->name('recent-posts');

Route::post('/post', [PostController::class, 'create'])->name('post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
