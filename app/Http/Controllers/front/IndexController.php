<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('main.front.index');
    }

    public function search() {
        $genre = Category::take(6)->inRandomOrder()->distinct()->get();
        return view('main.front.search', compact('genre'));
    }
}
