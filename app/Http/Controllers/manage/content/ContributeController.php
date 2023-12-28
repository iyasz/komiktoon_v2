<?php

namespace App\Http\Controllers\manage\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContributeController extends Controller
{
    public function index() {
        return view('main.contribute.index');
    }
}
