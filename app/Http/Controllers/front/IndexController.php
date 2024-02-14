<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Content;
use App\Models\Histories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        $content = Content::where('status', 3)->get();
        return view('main.front.index', compact('content'));
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

    public function history() {
        
        $history = Histories::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        

        return view('main.front.history', compact('history'));
    }
}
