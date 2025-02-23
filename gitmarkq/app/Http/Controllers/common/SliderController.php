<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Str;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('id','DESC')->get();
        return view('admin.slider.index',compact('slider'));
    
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $data['image'] = Slider::uploadFile($image);
        }
        Slider::create($data);
        return redirect()->route('slider.index')->with('success_message', 'Slider created successfully.');
    
    }

    public function edit($id)
    {
        $data = Slider::findorFail($id);
        return view('admin.slider.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $slider = Slider::findorFail($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            Slider::deleteFile($slider->image);
            $data['image'] = Slider::uploadFile($image);
        }
        $slider->update($data);
        return redirect()->route('slider.index')->with('success_message', 'Slider updated successfully.');
    
    }

    public function delete($id)
    {
        $slider = Slider::findorFail($id);
        Slider::deleteFile($slider->image);
        $slider->delete();
        return redirect()->route('slider.index')->with('success_message', 'Slider deleted successfully.');
    
    }
}
