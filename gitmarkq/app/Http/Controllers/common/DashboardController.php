<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latest_posts  =[];
        $latest_awards  =[];
        $latest_pages   =[];
        $all_support   =[];
        return view('admin.index',compact('latest_posts','latest_awards','latest_pages','all_support'));
    }
}
