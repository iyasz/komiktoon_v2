<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    function create() {
        return view('main.contribute.chapter.create');
    }
}
