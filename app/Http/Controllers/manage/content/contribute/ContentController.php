<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index() {
        $draftContent = Content::where('status', 1)->where('user_id', Auth::user()->id)->get();
        $confirmedContent = Content::where('status', 2)->where('user_id', Auth::user()->id)->get();
        $terbitContent = Content::where('status', 3)->where('user_id', Auth::user()->id)->get();
        $rejectedContent = Content::where('status', 4)->where('user_id', Auth::user()->id)->get();

        $contentCount = Content::where('user_id', Auth::user()->id)->count();
        $contentConfirmedCount = Content::where('status', 2)->where('user_id', Auth::user()->id)->count();
        $contentTerbitCount = Content::where('status', 3)->where('user_id', Auth::user()->id)->count();

        return view('main.contribute.content.index', compact('draftContent', 'confirmedContent', 'terbitContent', 'rejectedContent', 'contentCount', 'contentConfirmedCount', 'contentTerbitCount'));
    }
    
    public function create() {
        $genre = Category::all();
        return view('main.contribute.content.create', compact('genre'));
    }

    public function getValidationImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:500|required|image|mimes:jpg,png,jpeg|dimensions:min_width=840,min_height=840'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
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

    public function store(Request $request) {
    
        $request->validate([
            'author' => 'required|max:50|string',
            'title' => 'required|max:50|string|unique:contents,title',
            'radioGenre' => ['required', 'array', 'max:3'],
            'synopsis' => 'required|max:500|string',
            'thumbnail' => 'required|max:500|mimes:jpeg,png,jpg|image|dimensions:min_width=840,min_height=840',
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
            'thumbnail.dimensions' => 'Gambar harus lebih dari 840x840 pixel!',
        ]);

        // content insert 
        $content = new Content();
        $content->user_id = Auth::user()->id;
        $content->author = $request->author;
        $content->title = $request->title;
        $slug = $content->slug = Str::slug($request->title);
        $content->synopsis = $request->synopsis;
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

    public function handleUpdateConfirmed(Request $request, $slug) {
        $content = Content::where('slug', $slug)->where('status', 2)->where('user_id', Auth::user()->id)->first();

        if(!$content){
            abort(404);
        }


        return view('main.contribute.content.confirm', compact('content'));
    }

    public function handleBgBannerValidation(Request $request, $slug) {
        $file = $request->file('file');

        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:1024|required|image|mimes:jpg,png,jpeg|dimensions:min_width=1920,min_height=320'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 1MB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.dimensions' => 'Gambar harus lebih dari 1920x320 pixel!',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }
    }

    public function handleCharImageValidation(Request $request, $slug) {
        $file = $request->file('file');

        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:1024|required|image|mimes:png|dimensions:min_width=1200,min_height=240'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 1MB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah PNG',
                'file.dimensions' => 'Gambar harus lebih dari 1200x240 pixel!',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }
    }

    public function storeUpdateContent(Request $request, $slug) {
        $content = Content::where('user_id', Auth::user()->id)->where('slug', $slug)->where('status', 2)->first();

        if(!$content){
            abort(404);
        }

        $content->status = 3;
        $content->update_day = $request->update_day;
        if($request->update_day_2){
            $content->update_day_2 = $request->update_day_2;
        }
        $content->bg_banner = $request->bg_banner->store('banner/contribute', 'public');
        $content->banner = $request->banner->store('banner/contribute', 'public');
        $content->update();

        return redirect('/komik/'.$content->slug.'/list');
    }


}
