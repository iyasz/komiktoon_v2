<?php

namespace App\Http\Controllers\manage\admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Report;
use App\Models\Takedown;
use App\Models\User;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index() {

        $userCount = User::whereHas('contents', function($query){
            $query->where('status', 3);
        })->count();
        
        $takedownCount = Takedown::count();
        $reportCount = Report::whereHas('content', function($query){
            $query->where('status', 3);
        })->count();


        $data7Days = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subDays($i);
            $formattedDate = $date->translatedFormat('j F'); 
            $dayOfWeek = ucfirst($date->translatedFormat('l')); 
        
            $viewTotal = View::whereDate('created_at', $date->toDateString())->count();
        
            $data7Days[] = [
                "date" => $formattedDate,
                "viewTotal" => $viewTotal
            ];
        }

        $komikUpdatedCount = Content::where('status', 2)->count();
        $komikActiveCount = Content::where('status', 3)->count();
        $komikTakedownCount = Content::where('status', 5)->count();

        $data7toJson = json_encode($data7Days);
        

        return view('manage.admin.dashboard', compact('userCount', 'takedownCount', 'reportCount', 'data7toJson', 'komikUpdatedCount', 'komikActiveCount', 'komikTakedownCount'));
    }

    public function getDataKomikSelect(Request $request) {
        $startDate = Carbon::now()->subDays(6)->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d'); 

        if($request->userCreator){
            $userCount = '';
            if($request->userCreator == 7){

                $userCount = User::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate. ' 23:59:59'])->whereHas('contents', function($query){
                    $query->where('status', 3);
                })->count();
                
            }else{

                $userCount = User::whereHas('contents', function($query){
                    $query->where('status', 3);
                })->count();

            }
            return response()->json(['contentCount' => $userCount]);
        }

        if($request->dataTakedown){
            $takedownCount = '';
            if($request->dataTakedown == 7){
                $takedownCount = Takedown::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate. ' 23:59:59'])->count();

            }else{
                
                $takedownCount = Takedown::count();
            }
            return response()->json(['takedownCount' => $takedownCount]);
            
        }
        
        if($request->dataReport){
            if($request->dataReport == 7){
                
                $reportCount = Report::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate. ' 23:59:59'])->count();

            }else{
                $reportCount = Report::whereHas('content', function($query){
                    $query->where('status', 3);
                })->count();
                
            }
            
            return response()->json(['reportCount' => $reportCount]);
        }

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
