<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuildQuit;
use App\Models\BuildQuitsMeta;

class BuildQuitController extends Controller
{
    public function index()
    {
        $buildQuit = BuildQuit::all();
        return view('admin.buildquit.index', compact('buildQuit'));
    }

    public function show($id)
    {
        $data = BuildQuit::find($id);
        $buildQuitMeta = BuildQuitsMeta::where('build_quit_id', $id)->first();
        return view('admin.buildquit.show', compact('data', 'buildQuitMeta'));
    }
}
