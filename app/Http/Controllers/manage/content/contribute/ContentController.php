<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index() {
        $contentTerbit = Content::where('status', 2)->where('user_id', Auth::user()->id)->get();
        

        $contentTolak = Content::where('status', 3)->where('user_id', Auth::user()->id)->get();
        
        
        $contentDraft = Content::where('status', 1)->where('user_id', Auth::user()->id)->get();
        $likeDraft = Like::count();
        
        return view('main.contribute.content.index', compact('contentTerbit', 'contentTolak', 'contentDraft'));
    }
    
    public function create() {
        $genre = Category::all();
        return view('main.contribute.content.create', compact('genre'));
    }

    public function getValidationImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:500|required|image|mimes:jpg,png,jpeg|dimensions:min_width=1080,min_height=1080'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.dimensions' => 'Gambar harus lebih dari 1080x1080 pixel!',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }

        return;

    }

    public function store(Request $request) {
    
        $request->validate([
            'author' => 'required|max:50|string',
            'title' => 'required|max:50|string|unique:contents,title',
            'radioGenre' => ['required', 'array', 'max:3'],
            'synopsis' => 'required|max:500|string',
            'thumbnail' => 'required|max:500|mimes:jpeg,png,jpg|image|dimensions:min_width=1080,min_height=1080',
        ],[
            'author.required' => 'Author tidak boleh kosong!',
            'author.max' => 'Nama author terlalu panjang!',

            'title.required' => 'Judul serial tidak boleh kosong!',
            'title.max' => 'Judul serial terlalu panjang!',
            'title.unique' => 'Judul serial sudah ada!',
            
            'radioGenre.required' => 'Genre tidak boleh kosong!',
            
            'synopsis.required' => 'Sinopsis tidak boleh kosong!',
            'synopsis.max' => 'Sinopsis terlalu panjang!',

            'thumbnail.required' => 'File gambar tidak boleh kosong!',
            'thumbnail.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
            'thumbnail.mimes' => 'Format file harus JPG, JPEG, dan PNG',
            'thumbnail.image' => 'Format file harus JPG, JPEG, dan PNG',
            'thumbnail.dimensions' => 'Gambar harus lebih dari 1080x1080 pixel!',
        ]);

        // content insert 
        $content = new Content();
        $content->user_id = Auth::user()->id;
        $content->author = $request->author;
        $content->title = $request->title;
        $slug = $content->slug = Str::slug($request->title);
        $content->synopsis = $request->synopsis;
        $content->type = 1;
        $content->status = 1;
        $content->thumbnail = $request->thumbnail->store('contents/thumbnail', 'public');
        $content->save();

        $contentId = $content->id;

        // genre detail insert 

        $genreData = $request->radioGenre;

        foreach($genreData as $data){
            $genreDetail  = new CategoryDetail();
            $genreDetail->content_id = $contentId;
            $genreDetail->category_id = $data;
            $genreDetail->save();
        }

        return redirect('/contribute/chapter/create/'.$slug)->with('success', 'Serial berhasil dibuat!');

    }

}
