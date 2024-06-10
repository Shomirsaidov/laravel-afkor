<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    public function create(Request $request) {

        $comment = Comment::create([
            "author" => $request->input('author'),
            "text" => $request->input('text'),
            "product_id" => $request->input('product_id')
        ]);


        return back();
    
    
    }
}
