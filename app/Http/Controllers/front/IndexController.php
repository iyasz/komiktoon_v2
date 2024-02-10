<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        return view('main.front.index');
    }

    public function search() {
        $genre = Category::take(6)->inRandomOrder()->distinct()->get();
        return view('main.front.search', compact('genre'));
    }
    
    public function policyPrivacy() {
        return view('main.front.privacypolicy');
    }
    
    public function termsOfUse() {
        return view('main.front.termsofuse');
    }
    
    public function favorit() {
        $favorit = Bookmark::where('user_id', Auth::user()->id)->get();
        return view('main.front.favorit', compact('favorit'));
    }
}
