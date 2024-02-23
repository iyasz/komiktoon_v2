<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Models\Chapter;
use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $chapterCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 2)->count() + 1;
        $chapterExtraCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 1)->count();

        return view('main.contribute.chapter.create', compact('content', 'chapterExtraCount', 'chapterCount'));
    }

    public function getValidationImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:500|image|mimes:jpg,png,jpeg|dimensions:min_width=160,min_height=160'
            ],[
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

    }

    public function getValidationChaptersImage() {
        return true;
    }

    public function handleInsertChapter(Request $request, $slug) {
        $content = Content::where('slug', $slug)->first();

        $chapterCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 2)->count() + 1;
        $chapterExtraCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 1)->count() + 1;
    
        if (!$content) {
            abort(404);
        }

        $title = '';

        if($request->input('is_extra_chapter') == 2){

            $title = 'CHAPTER '.$chapterCount;
    
            if($request->input('title') != ''){
                $title = 'CHAPTER '.$chapterCount.' - '.strtoupper($request->input('title'));
            }
            
        }else{

            if($request->input('title') != ''){
                $title = 'EXTRA CHAPTER - '.strtoupper($request->input('title'));
            }else{
                $title = 'EXTRA CHAPTER - '.$chapterExtraCount;
                $title = 'EXTRA CHAPTER - '.$chapterExtraCount;
            }
            
        }

    
        $chapter = new Chapter();
        $chapter->content_id = $content->id;
        $chapter->is_extra_chapter = $request->input('is_extra_chapter');
        $chapter->title = $title;
        $slug = $chapter->slug = Str::slug($title);

        $imagesData = [];

        if ($request->has('gambar')) {
            foreach ($request->gambar as $index => $base64Data) {
  
                $imagePath = 'chapters/'.$content->slug.'/'.$slug.'/'.($index + 1).'.png';
                Storage::disk('public')->put($imagePath, base64_decode($base64Data)); 
                
                $imagesData[] = [
                    'photo' => $imagePath,
                    'ext' => pathinfo($imagePath, PATHINFO_EXTENSION), 
                ];
            }
        }
    
        $chapter->images = json_encode($imagesData);
        

        $chapter->thumbnail = $request->file('thumbnail')->store('chapters/thumbnail', 'public');
        $chapter->note = $request->input('note');
        $chapter->save();
    
        return response()->json(['res' => 'Data berhasil dibuat!']);
    }

    public function handleListChapter(Request $request, $slug) {
        $content = Content::where('user_id', Auth::user()->id)->where('slug', $slug)->whereNot('status', 4)->whereNot('status', 5)->first();

        if(!$content){
            abort(404);
        }
        

        return view('main.contribute.chapter.list', compact('content'));
    }

    public function handleDeleteChapter(Request $request) {
        $chapter = Chapter::where('slug', $request->data)->first();
        if(!$chapter){
            abort(404);
        }

        $chapterCount = Chapter::where('content_id', $chapter->content->id)->count();

        if($chapterCount < 2){
            return response()->json(['message' => 'failed']);
        }else{   
            $likes = Like::where('chapter_id', $chapter->id)->get();
            $views = View::where('chapter_id', $chapter->id)->get();
    
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
    
            Storage::disk('public')->delete($chapter->thumbnail); 
            Storage::disk('public')->deleteDirectory('chapters/'.$chapter->content->slug.'/'.$chapter->slug);
    
    
            $chapter->delete();
            return response()->json(['message' => 'success']);

        }
    }

    public function showEditChapter($slugContent, $slugChapter) {
        $content = Content::where('slug', $slugContent)->where(function($query) {
                      $query->where('status', 3)->orWhere('status', 1);
                  })->first();
        if(!$content || $content->user_id != Auth::user()->id){
            abort(404);
        }

        
        $chapter = Chapter::where('slug', $slugChapter)->where('content_id', $content->id)->first();
        if(!$chapter){
            abort(404);
        }
        $isExtraChapter = '';
        // $chapterNumber = substr($chapter->title, strpos($chapter->title, 'CHAPTER') + strlen('CHAPTER'));
        // dd(trim($chapterNumber));
        
        if($chapter->is_extra_chapter == 1){
            $isExtraChapter = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 1)->pluck('id')->count();
        }else{
            $isExtraChapter = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 2)->pluck('id')->count();
        }

        $chapterExtraCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 1)->count();

        return view('main.contribute.chapter.edit', compact('content', 'chapterExtraCount', 'isExtraChapter', 'chapter'));
    }

    public function handleUpdateChapter(Request $request, $slugContent, $slugChapter) {
        $content = Content::where('slug', $slugContent)->first();

        // $chapterCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 2)->count() + 1;
        // $chapterExtraCount = Chapter::where('content_id', $content->id)->where('is_extra_chapter', 1)->count() + 1;
    
        if (!$content) {
            abort(404);
        }

        $chapter = Chapter::where('content_id', $content->id)->where('slug', $slugChapter)->first();

        if (!$chapter) {
            abort(404);
        }

        $title = $chapter->title;
        $slug = $chapter->slug;

        if($request->input('title')){
            $title = $chapter->title = preg_replace('/^(EXTRA CHAPTER|CHAPTER \d+) - .*/', '$1', $chapter->title).' - '.strtoupper($request->input('title'));
            $slug = $chapter->slug = Str::slug($title);
        }

        if($request->file('thumbnail') != ''){
            
            $exist = Storage::disk('public')->exists($chapter->thumbnail);
            if($exist){
                Storage::disk('public')->delete($chapter->thumbnail);   
            }

            $chapter->thumbnail = $request->file('thumbnail')->store('chapters/thumbnail', 'public');
        }

        $imagesData = [];

        if ($request->has('gambar')) {

            Storage::disk('public')->deleteDirectory('chapters/'.$chapter->content->slug.'/'.$chapter->slug);

            foreach ($request->gambar as $index => $base64Data) {
  
                $imagePath = 'chapters/'.$content->slug.'/'.$slug.'/'.($index + 1).'.png';
                Storage::disk('public')->put($imagePath, base64_decode($base64Data)); 
                
                $imagesData[] = [
                    'photo' => $imagePath,
                    'ext' => pathinfo($imagePath, PATHINFO_EXTENSION), 
                ];
            }

        }
    
        $chapter->images = json_encode($imagesData);

        $chapter->note = $request->input('note');
        $chapter->update();
    
        return response()->json(['res' => 'Data berhasil diubah!']);
    }

}
