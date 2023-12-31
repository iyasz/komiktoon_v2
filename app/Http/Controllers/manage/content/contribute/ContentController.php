<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index() {
        return view('main.contribute.content.index');
    }
    
    public function create() {
        return view('main.contribute.content.create');
    }

}
