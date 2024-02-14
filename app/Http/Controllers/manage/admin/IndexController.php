<?php

namespace App\Http\Controllers\manage\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index() {

        // dd(Carbon::now()->startOfWeek('0')->format('D'));
        return view('manage.admin.dashboard');
    }

    public function handleValidateImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:1024|required|image|mimes:jpg,png,jpeg|dimensions:min_width=840,min_height=840'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 1MB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.dimensions' => 'Gambar harus lebih dari 840x840 pixel!',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }

        return;
    }
}
