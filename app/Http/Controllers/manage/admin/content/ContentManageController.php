<?php

namespace App\Http\Controllers\manage\admin\content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentManageController extends Controller
{
    public function index() {
        $content = Content::where('status', 3)->get();
        return view('manage.admin.content.komik', compact('content'));
    }

}
