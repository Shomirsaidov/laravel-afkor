<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index() {
        $posts = DB::select('select * from posts where id = ?', [1]);
        return View('about', ['name' => $posts]);
    }
}
