<?php

use App\Models\Comment;
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