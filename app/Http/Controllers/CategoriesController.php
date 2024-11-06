<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    

    public function getSections(Request $request, $section) {
        $sections = Category::select('section','category')->where('category', $section)->distinct()->get();        
        return view('sections', ['data'=>$sections]);
    }
}
