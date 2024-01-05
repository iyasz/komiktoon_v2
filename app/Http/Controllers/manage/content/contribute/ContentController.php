<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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

            $allowedFileExtensions = ['png', 'jpg', 'jpeg'];
            $unallowedFileExtensions = ['video/mp4', 'video/mpeg', 'video/quicktime'];    
            if(!in_array($file->getClientOriginalExtension(), $allowedFileExtensions) || in_array($file->getClientMimeType(), $unallowedFileExtensions)){
                return response()->json(['error' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG.']);
            }else{
                $imageWidth = getimagesize($request->file)[0];
                $imageHeight = getimagesize($request->file)[1];

                if($imageHeight >= 1080 && $imageWidth >= 1080){

                    $size = round($file->getSize() / 1024, 2);
                    if ($size > 512) {
                        return response()->json(['error' => 'Tidak dapat mengunggah file lebih dari 500KB!']);
                    } else {
                        return response()->json(['success' => 'Ini berhasil!']);
                    }
                    
                }else{
                    return response()->json(['error' => 'Gambar harus lebih dari 1080x1080 pixel!']);
                }
            }

        }

        return;

    }

}
