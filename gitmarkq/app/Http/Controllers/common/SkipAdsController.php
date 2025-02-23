<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkipAds;

class SkipAdsController extends Controller
{
    public function index()
    {
        $skipads = SkipAds::orderBy('id','desc')->get();
        return view('admin.skipads.index', compact('skipads'));
    }

    public function create()
    {
        return view('admin.skipads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            // Chapter::deleteFile($chapter->image);
            $data['image'] = SkipAds::uploadFile($image);
        }
        SkipAds::create($data);
        return redirect()->route('skipads.index')->with('success_message', 'Skip Ads created successfully.');
    
    }

    public function edit($id)
    {
        $data = SkipAds::find($id);
        return view('admin.skipads.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        $ads = SkipAds::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            SkipAds::deleteFile($ads->image);
            $data['image'] = SkipAds::uploadFile($image);
        }
        $ads->update($data);
        return redirect()->route('skipads.index')->with('success_message', 'Skip Ads updated successfully.');
    
    }

    public function delete($id)
    {
        $ads = SkipAds::find($id);
        SkipAds::deleteFile($ads->image);
        $ads->delete();
        return redirect()->route('skipads.index')->with('success_message', 'Skip Ads deleted successfully.');
    
    }
}
