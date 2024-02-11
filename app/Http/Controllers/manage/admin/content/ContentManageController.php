<?php

namespace App\Http\Controllers\manage\admin\content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Takedown;
use Illuminate\Http\Request;

class ContentManageController extends Controller
{
    public function index() {
        $content = Content::where('status', 3)->orderBy('created_at', 'desc')->get();

        if(!$content){
            abort(404);
        }
        return view('manage.admin.content.komik', compact('content'));
    }
    
    public function detail($slug) {
        $content = Content::where('slug', $slug)
                  ->where(function ($query) {
                      $query->where('status', 3)
                            ->orWhere('status', 5);
                  })
                  ->first();


        if(!$content){
            abort(404);
        }
        return view('manage.admin.content.detail', compact('content'));
    }
    
    public function block(Request $request, $slug) {
        $content = Content::where('status', 3)->where('slug', $slug)->first();

        if(!$content){
            abort(404);
        }

        $takedown = new Takedown();
        $takedown->content_id = $content->id;
        $takedown->reason = $request->value;
        $takedown->save();


        $content->status = 5;
        $content->save();
        return response()->json(['success' => true]);
    }

}
