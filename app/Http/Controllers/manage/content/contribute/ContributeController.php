<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Like;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContributeController extends Controller
{
    public function index() {

        $totalContentsWithMostViews = Content::select('contents.*')
        ->join('chapters', 'contents.id', '=', 'chapters.content_id')
        ->join('views', 'chapters.id', '=', 'views.chapter_id')
        ->where('contents.status', 3)
        ->where('contents.user_id', Auth::user()->id)
        ->select('contents.*', DB::raw('COUNT(views.id) AS view_count'))
        ->groupBy('contents.id')
        ->orderByDesc('view_count')
        ->take(10)
        ->get();
        

        // dd($totalContentsWithMostViews);
    
    
        $contentIds = User::find(Auth::user()->id)->contents()->where('status', 3)->pluck('id');

        $totalLikes = Like::whereHas('chapter', function($query){
            $query->whereHas('content', function($e){
                $e->where('status', 3)->where('user_id', Auth::user()->id);
            });
        })->count();

        $totalViews = View::whereHas('chapter', function($query){
            $query->whereHas('content', function($e){
                $e->where('status', 3)->where('user_id', Auth::user()->id);
            });
        })->count();

        $totalComments = Comment::whereIn('content_id', function($query) {
            $query->select('id')
                ->from('contents')
                ->where('status', 3)
                ->where('user_id', Auth::user()->id);
        })
        ->count();


        return view('main.contribute.index', compact('totalLikes', 'totalViews', 'totalComments', 'totalContentsWithMostViews'));
    }


    public function contract() {
        return view('main.contribute.contract.contract');
    }
}
