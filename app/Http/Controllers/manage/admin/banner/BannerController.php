<?php

namespace App\Http\Controllers\manage\admin\banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function banners() {
        $banners = Banner::orderBy('created_at', 'desc')->get();
        return view('manage.admin.other.banners.index', compact('banners'));
    }

    public function create() {
        return view('manage.admin.other.banners.create');
    }

    public function store(Request $request) {
        $request->validate([
            'photo' => 'required|max:1024|mimes:jpeg,png,jpg|image',
        ],[
            'photo.required' => 'Photo tidak boleh kosong!',
            'photo.max' => 'Size photo terlalu besar!',
            'photo.mimes' => 'Photo harus jpeg, png, jpg!',
        ]);
    }
}
