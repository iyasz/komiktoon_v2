<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Histories;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Rejected;
use App\Models\Report;
use App\Models\Takedown;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
                'file' => 'max:2048|required|image|mimes:jpg,png,jpeg|dimensions:min_width=1920,min_height=320'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 2MB',
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
                'file' => 'max:2048|required|image|mimes:png|dimensions:min_width=1200,min_height=240'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 2MB',
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
        $content->is_ongoing = $request->is_ongoing;
        $content->update_day = $request->update_day;
        if($request->update_day_2){
            $content->update_day_2 = $request->update_day_2;
        }
        $content->bg_banner = $request->bg_banner->store('banner/contribute', 'public');
        $content->banner = $request->banner->store('banner/contribute', 'public');
        $content->update();

        return redirect('/komik/'.$content->slug.'/list');
    }

    public function handleDeleteContent(Request $request, $slug) {
        $content = Content::where('slug', $slug)->where('status','!=', 2)->where('user_id', Auth::user()->id)->first();
        if(!$content){
            abort(404);
        }

        $bookmarks = Bookmark::where('content_id', $content->id)->get();
        $chapters = Chapter::where('content_id', $content->id)->get();
        $cateogies = CategoryDetail::where('content_id', $content->id)->get();
        $histories = Histories::where('content_id', $content->id)->get();
        $comments = Comment::where('content_id', $content->id)->get();
        $likes = Like::whereHas('chapter', function ($query) use ($content) {
            $query->where('content_id', $content->id);
        })->get();
        $views = View::whereHas('chapter', function ($query) use ($content) {
            $query->where('content_id', $content->id);
        })->get();

        
        $ratings = Rating::where('content_id', $content->id)->get();
        $rejectedContent = Rejected::where('content_id', $content->id)->first();
        $reports = Report::where('content_id', $content->id)->get();

        $exist = Storage::disk('public')->exists($content->thumbnail);
        if($exist){
            Storage::disk('public')->delete($content->thumbnail); 
        }

        if($rejectedContent){
            $rejectedContent->delete();
        }

        if($likes->isNotEmpty()){
            foreach($likes as $data){
                $data->delete();
            }
        }

        if($views->isNotEmpty()){
            foreach($views as $data){
                $data->delete();
            }
        }

        if($reports->isNotEmpty()){
            foreach($reports as $data){
                $data->delete();
            }
        }

        if($ratings->isNotEmpty()){
            foreach($ratings as $data){
                $data->delete();
            }
        }

        if($comments->isNotEmpty()){
            foreach($comments as $data){
                $data->delete();
            }
        }

        if($bookmarks->isNotEmpty()){
            foreach($bookmarks as $data){
                $data->delete();
            }
        }

        if($histories->isNotEmpty()){
            foreach($histories as $dataHistory){
                $dataHistory->delete();
            }
        }

        if($cateogies->isNotEmpty()){
            foreach($cateogies as $item){
                $item->delete();
            }
        }
        
        if($chapters->isNotEmpty()){

            foreach($chapters as $data){
                Storage::disk('public')->delete($data->thumbnail);   
                Storage::disk('public')->deleteDirectory('/storage/chapters/'.$content->slug);

                $data->delete();
            }
        }

        $content->delete();

        return redirect('/contribute/content');

    }

    public function handleEditContent($slug) {
        $content = Content::where('slug', $slug)->whereNotIn('status', [4, 5])->where('user_id', Auth::user()->id)->first();
        if(!$content){
            abort(404);
        }

        $categoryDetails = CategoryDetail::where('content_id', $content->id)->get();
        
        $genre = Category::all();
        return view('main.contribute.content.edit', compact('genre', 'content', 'categoryDetails'));
    }
    
    public function handleUpdateContent(Request $request, $slug) {
        
        $content = Content::where('slug', $slug)->whereNot('status', 4)->whereNot('status', 5)->first();

        $request->validate([
            'author' => 'required|max:50|string',
            'title' => 'required|max:50|string|unique:contents,title,' . $content->id,
            'radioGenre' => ['required', 'array', 'max:3'],
            'synopsis' => 'required|max:500|string',
            'thumbnail' => 'nullable|max:500|mimes:jpeg,png,jpg|image|dimensions:min_width=840,min_height=840',
        ],[
            'author.required' => 'Author tidak boleh kosong!',
            'author.max' => 'Nama author terlalu panjang!',

            'title.required' => 'Judul serial tidak boleh kosong!',
            'title.max' => 'Judul serial terlalu panjang!',
            'title.unique' => 'Judul serial sudah ada!',
            
            'radioGenre.required' => 'Genre tidak boleh kosong!',
            
            'synopsis.required' => 'Sinopsis tidak boleh kosong!',
            'synopsis.max' => 'Sinopsis terlalu panjang!',

            'thumbnail.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
            'thumbnail.mimes' => 'Format file harus JPG, JPEG, dan PNG',
            'thumbnail.image' => 'Format file harus JPG, JPEG, dan PNG',
            'thumbnail.dimensions' => 'Gambar harus lebih dari 840x840 pixel!',
        ]);

        
        // content update 
        $content->author = $request->author;
        $content->title = $request->title;
        $slug = $content->slug = Str::slug($request->title);
        $content->synopsis = $request->synopsis;

        if($request->thumbnail){
            Storage::disk('public')->delete($content->thumbnail);   
            $content->thumbnail = $request->thumbnail->store('contents/thumbnail', 'public');
        }

        $contentId = $content->id;
        
        // genre detail update 
        $content->genreDetail()->delete(); 
        
        $genreData = $request->radioGenre;
        
        foreach($genreData as $data){
            $genreDetail = new CategoryDetail();
            $genreDetail->content_id = $content->id;
            $genreDetail->category_id = $data;
            $genreDetail->save();
        }

        $content->update();

        return redirect('/contribute/content/'.$content->slug.'/chapter')->with('success', 'Serial berhasil dibuat!');
        
    }

    function handleEditContent2($slug) {
        $content = Content::where('slug', $slug)->where('status', 3)->where('user_id', Auth::user()->id)->first();

        if(!$content){
            abort(404);
        }
        return view('main.contribute.content.banneredit', compact('content'));

    }

    function handleUpdateContent2(Request $request, $slug) {
        $content = Content::where('user_id', Auth::user()->id)->where('slug', $slug)->where('status', 3)->first();
        // dd($request->all());
        if(!$content){
            abort(404);
        }

        $content->is_ongoing = $request->is_ongoing;
        $content->update_day = $request->update_day;
        if($request->update_day_2){
            $content->update_day_2 = $request->update_day_2;
        }

        if($request->bg_banner){
            if($request->bg_banner != NULL){

                $exist = Storage::disk('public')->exists($content->bg_banner);
                
                if($exist){
                    Storage::disk('public')->delete($content->bg_banner);   
                }

                $content->bg_banner = $request->bg_banner->store('banner/contribute', 'public');
            }
        }

        if($request->banner){
            if($request->banner != NULL){

                $exist = Storage::disk('public')->exists($content->banner);
                
                if($exist){
                    Storage::disk('public')->delete($content->banner);   
                }

                $content->banner = $request->banner->store('banner/contribute', 'public');
            }
        }

        $content->update();

        return redirect('contribute/content/'.$content->slug.'/chapter');
    }

}
