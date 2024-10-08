<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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

        $content = Content::where('status', 3)->take(18)->inRandomOrder()->get();
        $newest = Content::where('status', 3)->orderBy('created_at', 'desc')->take(10)->get();

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

        if ($todayIndex == 0) {
            $todayIndex = 7;
        }

        $top5Views = Content::select('contents.*')
        ->join('chapters', 'contents.id', '=', 'chapters.content_id')
        ->join('views', 'chapters.id', '=', 'views.chapter_id')
        ->where('contents.status', 3)
        ->select('contents.*', DB::raw('COUNT(views.id) AS view_count'))
        ->groupBy('contents.id')
        ->orderByDesc('view_count')
        ->take(5)
        ->get();

        $banners = Banner::where('type', 1)->get();
        $smallBanners = Banner::where('type', 3)->get();

        $genreWith5Data = Category::inRandomOrder()->first();
        
        // $todayIndex = Carbon::now()->dayOfWeek === 0 ? 7 : Carbon::now()->dayOfWeek;

        $today = $days[$todayIndex];

        return view('main.front.index', compact('content', 'days', 'today', 'newest', 'top5Views', 'genreWith5Data', 'banners', 'smallBanners'));
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

        $startDate = Carbon::now()->subDays(6)->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');
        
        $topOneContents = Content::join('chapters', 'contents.id', '=', 'chapters.content_id')
            ->leftJoin('views', 'chapters.id', '=', 'views.chapter_id')
            ->leftJoin('likes', 'chapters.id', '=', 'likes.chapter_id')
            ->select('contents.*',
                     DB::raw('IFNULL(COUNT(DISTINCT views.id), 0) * 1 AS view_score'),
                     DB::raw('IFNULL(COUNT(DISTINCT likes.id), 0) * 3 AS like_score'))
            ->where('views.created_at', '>=', $startDate . ' 00:00:00')
            ->where('views.created_at', '<=', $endDate. ' 23:59:59')
            ->orWhere('likes.created_at', '>=', $startDate . ' 00:00:00')
            ->orWhere('likes.created_at', '<=', $endDate. ' 23:59:59')
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
            ->where('views.created_at', '>=', $startDate . ' 00:00:00')
            ->where('views.created_at', '<=', $endDate. ' 23:59:59')
            ->orWhere('likes.created_at', '>=', $startDate . ' 00:00:00')
            ->orWhere('likes.created_at', '<=', $endDate. ' 23:59:59')
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
            ->where('views.created_at', '>=', $startDate . ' 00:00:00')
            ->where('views.created_at', '<=', $endDate. ' 23:59:59')
            ->orWhere('likes.created_at', '>=', $startDate . ' 00:00:00')
            ->orWhere('likes.created_at', '<=', $endDate. ' 23:59:59')
            ->groupBy('contents.id')
            ->orderByRaw('view_score + like_score DESC')
            ->take(9)
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
