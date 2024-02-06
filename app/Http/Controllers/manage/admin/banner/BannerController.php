<?php

namespace App\Http\Controllers\manage\admin\banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function dashboardBannerView() {
        return view('manage.admin.other.banners.dashboardbanner');
    }
}
