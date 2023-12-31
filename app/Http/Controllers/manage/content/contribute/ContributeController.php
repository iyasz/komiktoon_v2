<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContributeController extends Controller
{
    public function index() {
        return view('main.contribute.index');
    }

    public function report() {
        return view('main.contribute.report.report');
    }

    public function warning() {
        return view('main.contribute.warning.warning');
    }

    public function contract() {
        return view('main.contribute.contract.contract');
    }
}
