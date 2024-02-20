<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Content;
use App\Models\Histories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {

        $content = Content::where('status', 3)->get();

        $days = [
            1 => 'SEN',
            2 => 'SEL',
            3 => 'RAB',
            4 => 'KAM',
            5 => 'JUM',
            6 => 'SAB',
            7 => 'MIN',
        ];

        $todayIndex = Carbon::now()->dayOfWeek; 
        // $todayIndex = Carbon::now()->dayOfWeek === 0 ? 7 : Carbon::now()->dayOfWeek;

        $today = $days[$todayIndex];

        return view('main.front.index', compact('content', 'days', 'today'));
    }

    public function search() {
        $dataContent = '';
        if (request()->has('q') && request()->filled('q')) {
            $q = request()->input('q'); 

            $dataContent = Content::where('status', 3)
            ->where(function($query) use ($q) {
                $query->where('author', 'like', "%$q%")->orWhere('title', 'like', "%$q%");
            })->get();

        } 

        $genre = Category::inRandomOrder()->distinct()->get();
        $content = Content::take(10)->inRandomOrder()->where('status', 3)->distinct()->get();
        return view('main.front.search', compact('genre', 'content', 'dataContent'));
        
    }

    public function genre() {
        $genre = Category::all();
        $result = null;
        if (request()->has('s') && request()->filled('s')) {
            $s = request()->input('s');

            $result = Category::where('slug', request('s'))->first();
        } 

        $content = Content::take(10)->where('status', 3)->inRandomOrder()->distinct()->get();
        

        return view('main.front.genre', compact('genre', 'result', 'content'));
    }
    
    public function populer() {
        // $contentMostPopuler = Content::inRandomOrder()->where('status', 3)->first();

        // $content = Content::where('status', 3)->whereNotIn('id', [$contentMostPopuler->id])->inRandomOrder()->take(10)->get();

        $startDate = Carbon::now()->subDays(7);

        $topOneContents = Content::join('chapters', 'contents.id', '=', 'chapters.content_id')
        ->leftJoin('views', 'chapters.id', '=', 'views.chapter_id')
        ->leftJoin('likes', 'chapters.id', '=', 'likes.chapter_id')
        ->select('contents.*', 
                 DB::raw('IFNULL(COUNT(DISTINCT views.id), 0) * 1 AS view_score'), 
                 DB::raw('IFNULL(COUNT(DISTINCT likes.id), 0) * 3 AS like_score')) 
        ->where('contents.created_at', '>=', $startDate)
        ->groupBy('contents.id')
        ->orderByRaw('view_score + like_score DESC') 
        ->first();


        $topOneContentsData = DB::table('contents')
            ->join('chapters', 'contents.id', '=', 'chapters.content_id')
            ->leftJoin('views', 'chapters.id', '=', 'views.chapter_id')
            ->leftJoin('likes', 'chapters.id', '=', 'likes.chapter_id')
            ->select('contents.*', 
                     DB::raw('IFNULL(COUNT(DISTINCT views.id), 0) * 1 AS view_score'), 
                     DB::raw('IFNULL(COUNT(DISTINCT likes.id), 0) * 3 AS like_score')) 
            ->where('contents.created_at', '>=', $startDate)
            ->groupBy('contents.id')
            ->orderByRaw('view_score + like_score DESC') 
            ->take(1)
            ->get();

        $topOneContentsDataIds = $topOneContentsData->pluck('id')->toArray();


        $topContents = Content::select('contents.*')
        ->join('chapters', 'contents.id', '=', 'chapters.content_id')
        ->leftJoin('views', 'chapters.id', '=', 'views.chapter_id')
        ->leftJoin('likes', 'chapters.id', '=', 'likes.chapter_id')
        ->selectRaw('IFNULL(COUNT(DISTINCT views.id), 0) * 1 AS view_score')
        ->selectRaw('IFNULL(COUNT(DISTINCT likes.id), 0) * 3 AS like_score')
        ->where('contents.created_at', '>=', $startDate)
        ->groupBy('contents.id')
        ->orderByRaw('view_score + like_score DESC')
        ->take(10)
        ->whereNotIn('contents.id', $topOneContentsDataIds)
        ->with('genreDetail')
        ->get();
    

        
        return view('main.front.populer', compact('topContents', 'topOneContents'));
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
