<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Models\Chapter;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{

    function index() {
        return view('main.contribute.chapter.index');
    }
    
    function create(String $slug) {
        $content = Content::where('slug', $slug)->first();
        if(!$content || $content->user_id != Auth::user()->id){
            abort(404);
        }

        $chapterCount = Chapter::where('content_id', $content)->where('is_extra_chapter', 2)->count() + 1;
        $chapterExtraCount = Chapter::where('content_id', $content)->where('is_extra_chapter', 1)->count();

        return view('main.contribute.chapter.create', compact('content', 'chapterExtraCount', 'chapterCount'));
    }

    public function getValidationImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:500|required|image|mimes:jpg,png,jpeg|dimensions:min_width=160,min_height=160'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.dimensions' => 'Gambar harus lebih dari 160x160 pixel!',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }

        return;
    }
}
