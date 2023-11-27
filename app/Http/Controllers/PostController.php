<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function recent() {
        $posts = Post::take(3)->orderBy('id','desc')->get();
        return view('posts', ['posts' => $posts]);
    }

    public function create(Request $request) {


        $validatedData = $request->validate([
            'title' => 'required|string|max:55',
            'text' => 'required|max:1000',
            'author' => 'string',
            'date' => 'required|string',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than :max characters.',
            'date.required' => 'Provide the data info !',
        ]);

        Post::create($validatedData);
        return redirect()->route('recent-posts');
    }
}





















