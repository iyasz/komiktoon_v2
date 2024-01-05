<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index() {
        return view('main.contribute.content.index');
    }
    
    public function create() {
        $genre = Category::all();
        return view('main.contribute.content.create', compact('genre'));
    }

    public function getValidationImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:500|required|image|mimes:jpg,png,jpeg'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }
            
            $imageWidth = getimagesize($request->file)[0];
            $imageHeight = getimagesize($request->file)[1];

            if($imageHeight <= 1080 && $imageWidth <= 1080){
                return response()->json(['error' => 'Gambar harus lebih dari 1080x1080 pixel!']);
            }

            return response()->json(['success' => 'Ini berhasil!']);

        }

        return;

    }

}
