<?php

namespace App\Http\Controllers\manage\admin\banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function bannersAuth() {
        $banners = Banner::orderBy('created_at', 'desc')->where('type', 2)->get();
        return view('manage.admin.other.auth-banners.index', compact('banners'));
    }
    
    public function authCreate() {
        return view('manage.admin.other.auth-banners.create');
    }

    public function authStore(Request $request) {
        $request->validate([
            'photo' => 'required|max:1024|mimes:jpeg,png,jpg|image',
        ],[
            'photo.required' => 'Photo tidak boleh kosong!',
            'photo.max' => 'Size photo terlalu besar!',
            'photo.mimes' => 'Photo harus jpeg, png, jpg!',
        ]);
        
        $banners = new Banner();
        $banners->photo = $request->photo->store('banner/auth','public');
        $banners->type = 2;
        $banners->save();
        
        return redirect('/panel/background/auth');
    }
    
    public function authDelete($id) {
        
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete($banner->photo); 
        
        $banner->delete();
        
        return redirect('/panel/background/auth');
    }

    // pemisah 
    
    public function bannerHome() {
        $banners = Banner::orderBy('created_at', 'desc')->where('type', 1)->get();
        return view('manage.admin.other.home-banners.index', compact('banners'));
    }

    public function homeCreate() {
        return view('manage.admin.other.home-banners.create');
    }

    public function homeStore(Request $request) {
        $request->validate([
            'link' => 'required',
            'photo' => 'required|max:1024|mimes:jpeg,png,jpg|image',
        ],[
            'link.required' => 'Link tidak boleh kosong!',
            
            'photo.required' => 'Photo tidak boleh kosong!',
            'photo.max' => 'Size photo terlalu besar!',
            'photo.mimes' => 'Photo harus jpeg, png, jpg!',
        ]);
        
        $banners = new Banner();
        $banners->photo = $request->photo->store('banner/home','public');
        $banners->type = 1;
        $banners->link = $request->link;
        $banners->save();
        
        return redirect('/panel/background/home');  
    }
    
    public function homeDelete($id) {
        
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete($banner->photo); 
        
        $banner->delete();
        
        return redirect('/panel/background/home');
    }

}
