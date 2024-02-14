<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {

        // $days = [
        //     'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        // ];
        // $today = Carbon::now();
        // $lastSevenDays = [];
        
        // for ($i = 1; $i <= 7; $i++) {
        //     $lastSevenDays[] = $days[$today->dayOfWeek];
        //     $today->subDay(); 
        // }

        $today = Carbon::now();

        // Menyimpan nama bulan dalam Bahasa Indonesia
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $lastSevenMonths = [];

        for ($i = 1; $i <= 7; $i++) {
            $lastSevenMonths[] = $months[$today->month];
            $today->subMonth(); // Kurangi satu bulan
        }

        $lastSevenMonths = array_reverse($lastSevenMonths);
        

        return view('main.contribute.report.report', compact('lastSevenMonths'));
    }
}
