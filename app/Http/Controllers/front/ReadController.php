<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadController extends Controller
{
    public function index($slug) {
        $content = Content::where('slug', $slug)->first();
        
        if(!$content){
            abort(404);
        }
        $hasFavorit = 0;

        if(Auth::user()){
            $hasFavorit = Bookmark::where('user_id', Auth::user()->id)->where('content_id', $content->id)->count();
        }

        // dd($hasFavorit);
        return view('main.front.list.index', compact('content', 'hasFavorit'));
    }

    public function handleFavoritContent(Request $request) {
        $content = Content::where('slug', $request->slug)->first();


        $checkFavorit = Bookmark::where('user_id', Auth::user()->id)->where('content_id', $content->id)->count();
        $favorit = Bookmark::where('user_id', Auth::user()->id)->where('content_id', $content->id)->first();
        $message = '';

        if($checkFavorit == NULL || $checkFavorit == 0){
            $bookmark = new Bookmark();
            $bookmark->user_id = Auth::user()->id;
            $bookmark->content_id = $content->id;
            $bookmark->save();
            $message = 'create';
        }else{
            $favorit->delete();
            $message = "delete";
        }

        return response()->json(['res' => $message]);
    }
    
    public function chapter($slugContent, $slugChapter) {
        $content = Content::where('slug', $slugContent)->first();

        if(!$content){
            abort(404);
        }

        $chapter = Chapter::where('content_id', $content->id)->where('slug', $slugChapter)->first();
        
        if(!$chapter){
            abort(404);
        }

        
        $indexOfCreated = Chapter::where('content_id', $content->id)
        ->where('created_at', '<=', $chapter->created_at) 
        ->count();
    
        $decodeDataChapters = json_decode($chapter->images, true);

        // dd($chapter);
        return view('main.front.list.chapter', compact('decodeDataChapters', 'content', 'indexOfCreated'));
    }
}
