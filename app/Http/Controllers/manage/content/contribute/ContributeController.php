<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributeController extends Controller
{
    public function index() {
        $content = Content::get();
        $like = Content::where('user_id', Auth::user()->id);

        return view('main.contribute.index', compact('content'));
    }

    public function report() {
        return view('main.contribute.report.report');
    }

    public function contract() {
        return view('main.contribute.contract.contract');
    }
}
