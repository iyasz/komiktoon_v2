<?php

namespace App\Http\Controllers\manage\admin\warning;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Report;
use Illuminate\Http\Request;

class WarningController extends Controller
{
    public function index() {
        $warning = Report::whereHas('content', function ($query) {
            $query->where('status', 3);
        })->orderBy('created_at', 'desc')->get();

        if(!$warning){
            abort(404);
        }

        return view('manage.admin.warning.index', compact('warning'));
    }
}
