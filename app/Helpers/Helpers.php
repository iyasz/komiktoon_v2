<?php

use App\Models\Comment;
use App\Models\Content;
use App\Models\Like;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function getCommentCountByDate($year, $month, $day) {
   
    return Comment::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $day)->whereHas('content', function($query){
        $query->where('status', 3)->where('user_id', Auth::user()->id);
    })->count();
}

function getLikeCountByDate($year, $month, $day) {
    return Like::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $day)->whereHas('chapter', function($query){
        $query->whereHas('content', function($e){
            $e->where('status', 3)->where('user_id', Auth::user()->id);;
        });
    })->count();
}

function getViewCountByDate($year, $month, $day) {
    return View::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $day)->whereHas('chapter', function($query){
        $query->whereHas('content', function($e){
            $e->where('status', 3)->where('user_id', Auth::user()->id);;
        });
    })->count();
}

function getContentUseWeek($week) {
    $days = [
        "SEN" => 1,
        "SEL" => 2,
        "RAB" => 3,
        "KAM" => 4,
        "JUM" => 5,
        "SAB" => 6,
        "MIN" => 7,
    ];
    
    return Content::where('status', 3)->where(function($query) use ($days, $week) {
                  $query->where('update_day', $days[$week])->orWhere('update_day_2', $days[$week]);
              })->take(8)->get();

}