<?php

namespace App\Http\Controllers\manage\admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Report;
use App\Models\Takedown;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index() {

        $contentCount = Content::where('status', 3)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $takedownCount = Takedown::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $reportCount = Report::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();


        $datesAndDays = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subDays($i);
            $formattedDate = $date->translatedFormat('j F'); // Format tanggal seperti '13 Februari'
            $dayOfWeek = ucfirst($date->translatedFormat('l')); // Hari dalam Bahasa Indonesia dan huruf pertama kapital
        
            // Lakukan query untuk mendapatkan jumlah view untuk tanggal saat ini
            $viewTotal = View::whereDate('created_at', $date->toDateString())->count();
        
            $datesAndDays[] = [
                "date" => $formattedDate,
                "viewTotal" => $viewTotal
            ];
        }
        
        // Contoh output
        dd($datesAndDays);
        


        // $view = View::where('created_at' < 7 days);
        // dd(Carbon::now()->startOfWeek('0')->format('D'));

        return view('manage.admin.dashboard', compact('contentCount', 'takedownCount', 'reportCount'));
    }

    public function handleValidateImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:1024|required|image|mimes:jpg,png,jpeg'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 1MB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }

        return;
    }
}
