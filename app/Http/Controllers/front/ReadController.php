<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function index($slug) {
        $content = Content::where('slug', $slug)->first();

        if(!$content){
            abort(404);
        }
        return view('main.front.list.index', compact('content'));
    }

    public function chapter($slugContent, $slugChapter) {
        $content = Content::where('slug', $slugContent)->first();

        if(!$content){
            abort(404);
        }
        return view('main.front.list.index', compact('content'));
    }
}
