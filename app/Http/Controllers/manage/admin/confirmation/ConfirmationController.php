<?php

namespace App\Http\Controllers\manage\admin\confirmation;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Content;
use App\Models\Rejected;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index() {
        $content = Content::where('status', 1)->whereHas('chapters')->orderBy('created_at', 'desc')->get();
        // dd($content);


        return view('manage.admin.confirmation.index', compact('content'));
    }
    
    public function detail($slug) {
        $content = Content::where('slug', $slug)->first();
        if(!$content){
            abort(404);
        }
        
        return view('manage.admin.confirmation.detail', compact('content'));
    }

    public function confirm($slug) {
        $content = Content::where('slug', $slug)->first();
        if(!$content){
            abort(404);
        }

        $content->status = 2;
        $content->update();

        return redirect('/panel/confirmation/content');
    }

    public function rejected(Request $request, $slug) {
        $content = Content::where('slug', $slug)->first();
        if(!$content){
            abort(404);
        }

        $handleReject = new Rejected();
        $handleReject->content_id = $content->id;
        $handleReject->reason = $request->value;
        $handleReject->save();

        $content->status = 4;
        $content->update();

        return response()->json(['success' => 'success']);
    }
}
