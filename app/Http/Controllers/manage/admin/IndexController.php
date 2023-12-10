<?php

namespace App\Http\Controllers\manage\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('manage.admin.dashboard');
    }
}
