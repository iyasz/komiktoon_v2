<?php

namespace App\Http\Controllers\manage\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

        // dd(Carbon::now()->startOfWeek('0')->format('D'));
        return view('manage.admin.dashboard');
    }
}
