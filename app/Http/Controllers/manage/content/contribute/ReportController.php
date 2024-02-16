<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {

        $today = Carbon::now();

        // Menyimpan nama bulan dalam Bahasa Indonesia
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $lastSevenMonths = [];

        for ($i = 0; $i < 7; $i++) {
            $monthNumber = $today->month;
            $monthName = $months[$monthNumber];
            $year = $today->year;
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);
            
            $monthData = [
                "bulan" => $monthName,
                "bulanKe" => str_pad($monthNumber, 2, '0', STR_PAD_LEFT),
                "tahun" => $year,
                "jumlahHari" => $daysInMonth
            ];
        
            $lastSevenMonths[] = $monthData;
        
            $today->subMonth(); 
        }
        
        $lastSevenMonths = array_reverse($lastSevenMonths);
        
        


        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $likes = Like::whereBetween('created_at', [$startDate, $endDate])->get();

        $comments = Comment::whereBetween('created_at', [$startDate, $endDate])->get();
        
        $likesGrouped = $likes->groupBy(function ($like) {
            return $like->created_at->format('m-d');
        });
        
        $commentsGrouped = $comments->groupBy(function ($comment) {
            return $comment->created_at->format('d M Y');
        });
        

        return view('main.contribute.report.report', compact('lastSevenMonths', 'likesGrouped', 'lastSevenMonths'));
    }
}
