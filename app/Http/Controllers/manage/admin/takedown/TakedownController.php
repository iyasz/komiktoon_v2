<?php

namespace App\Http\Controllers\manage\admin\takedown;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Takedown;
use Illuminate\Http\Request;

class TakedownController extends Controller
{
    public function index() {
        $content = Content::where('status', 5)->orderBy('created_at', 'desc')->get();
        if(!$content){
            abort(404);
        }
        return view('manage.admin.takedown.index', compact('content'));
    }
    
    public function recovery(Request $request, $slug) {
        $content = Content::where('status', 5)->where('slug', $slug)->first();
        if(!$content){
            abort(404);
        }

        $takedown = Takedown::where('content_id', $content->id)->first();
        $takedown->delete();

        $content->status = 3;
        $content->update();

        return redirect('/panel/takedown/content');
        
    }
}
