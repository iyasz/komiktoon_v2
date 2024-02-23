<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Histories;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Report;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadController extends Controller
{
    public function index($slug) {
        $content = Content::where('slug', $slug)->where('status', 3)->first();
        
        if(!$content){
            abort(404);
        }
        
        $firstChapter = Chapter::orderBy('created_at', 'asc')->where('content_id', $content->id)->first();

        $commentCount = Comment::where('content_id', $content->id)->count();
        $getAllComment = Comment::where('content_id', $content->id)->orderBy('created_at', 'desc')->get();
        
        $totalRatings = Rating::where('content_id', $content->id)->count();
        $totalRatingSum = Rating::where('content_id', $content->id)->sum('rate');
        
        if ($totalRatings > 0) {
            $totalRating = $totalRatingSum / $totalRatings * 2;
        } else {
            $totalRating = 0; 
        }
        
        
        $hasFavorit = 0;
        $ratingStar = 0;
        if(Auth::user()){
            $ratingStar = Rating::where('user_id', Auth::user()->id)->where('content_id', $content->id)->value("rate");
            $hasFavorit = Bookmark::where('user_id', Auth::user()->id)->where('content_id', $content->id)->count();
        }

        return view('main.front.list.index', compact('content', 'hasFavorit', 'firstChapter', 'commentCount', 'totalRating', 'ratingStar', 'getAllComment'));
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
    
    public function handleCommentContent(Request $request, $slugContent) {
        $content = Content::where('slug', $slugContent)->first();

        if(!$content){
            abort(404);
        }
        
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->content_id = $content->id;
        $comment->body = $request->comment;
        $comment->save();
        
        return response()->json(['res' => 'success']);
    }
    
    public function handleDeleteComment(Request $request, $slugContent, $idComment) {
        $content = Content::where('slug', $slugContent)->first();
    
        if(!$content){
            abort(404);
        }

        $hasComment = Comment::where('content_id', $content->id)->where('user_id', Auth::user()->id)->where('id', $idComment)->first();
        if(!$hasComment){
            abort(404);
        }

        $hasComment->delete();
        return redirect('/komik/'.$content->slug.'/list')->with('status', 'active');
    }
    
    public function chapter($slugContent, $slugChapter) {
        $content = Content::where('slug', $slugContent)->where('status', 3)->first();

        if(!$content){
            abort(404);
        }

        $chapter = Chapter::where('content_id', $content->id)->where('slug', $slugChapter)->first();
        
        if(!$chapter){
            abort(404);
        }

        if(Auth::user()){
            $hasHistory = Histories::where('user_id', Auth::user()->id)->where('content_id', $content->id)->first();

            if($hasHistory){
                $hasHistory->delete();
            }

            $testing = new Histories();
            $testing->user_id = Auth::user()->id;
            $testing->content_id = $content->id;
            $testing->save();

        }

        
        $view = new View();
        if(Auth::user()){
            $view->user_id = Auth::user()->id;
        }
        $view->chapter_id = $chapter->id;
        $view->save();
        
        $indexOfCreated = Chapter::where('content_id', $content->id)
        ->where('created_at', '<=', $chapter->created_at) 
        ->count();
        
        $decodeDataChapters = json_decode($chapter->images, true);

        // cek like 
        $isLike = 0;
        $chapterLikeCount = Like::where('chapter_id', $chapter->id)->count();

        if(Auth::user()){
            $isLike = Like::where('user_id', Auth::user()->id)->where('chapter_id', $chapter->id)->count();
        }

        // next and previous 
        $chapterNext = Chapter::where('content_id', $content->id)->where('created_at', '>', $chapter->created_at)->first();
        $chapterPrevious = Chapter::where('content_id', $content->id)->where('created_at', '<', $chapter->created_at)->orderBy('created_at', 'desc')->first();
    
        return view('main.front.list.chapter', compact('chapter','decodeDataChapters', 'content', 'indexOfCreated', 'chapterNext', 'chapterPrevious', 'isLike', 'chapterLikeCount'));
    }

    public function handleLikeChapter(Request $request, $slugContent, $slugChapter) {
        $chapter = Chapter::where('slug', $slugChapter)->first();

        if(!$chapter || !Auth::user()){
            abort(404);
        }

        $hasLike = Like::where('user_id', Auth::user()->id)->where('chapter_id', $chapter->id)->first();
        $message = '';
        
        if(!$hasLike){
            $newLike = new Like();
            $newLike->user_id  = Auth::user()->id;
            $newLike->chapter_id  = $chapter->id;
            $newLike->save();
            $message = 'create';
        }else{
            $hasLike->delete();
            $message = 'delete';
        }

        $chapterLikeCount = Like::where('chapter_id', $chapter->id)->count();

        return response()->json(['like' => $chapterLikeCount, 'status' => $message]);
    }

    public function handleReportContent(Request $request, $slugContent, $slugChapter) {
        $content = Content::where('slug', $slugContent)->first();
        if(!$content){
            abort(404);
        }

        $hasReport = Report::where('user_id', Auth::user()->id)->where('content_id', $content->id)->where('created_at', '>=', Carbon::now()->subDay())->count();

        $message = '';
        if($hasReport == 2){
            $message = "fail";
        }else{   
            $report = new Report();
            $report->user_id = Auth::user()->id;
            $report->content_id = $content->id;
            $report->reason = $request->value;
            $report->save();
            $message = 'success';
        }

        return response()->json(['message' => $message]);
    }

    public function handleRatingContent(Request $request, $slugContent) {
        $content = Content::where('slug', $slugContent)->first();
        if(!$content){
            abort(404);
        }
        $rating = Rating::where('user_id', Auth::user()->id)->where('content_id', $content->id)->first();

        if($rating){
            $rating->rate = $request->rate;
            $rating->update();
        }else{
            $rate = new Rating();
            $rate->user_id = Auth::user()->id;
            $rate->content_id = $content->id;
            $rate->rate = $request->rate;
            $rate->save();
        }

        $totalRatings = Rating::where('content_id', $content->id)->count();
        $totalRatingSum = Rating::where('content_id', $content->id)->sum('rate');
        $totalRating = $totalRatingSum / $totalRatings * 2;

        return response()->json(['data' => $totalRating]);
    }
}
