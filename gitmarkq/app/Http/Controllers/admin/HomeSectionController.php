<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection;

class HomeSectionController extends Controller
{
    public function index()
    {
        return view('admin.setting.home-section');
    }   

    public function edit($slug)
    {
       
        $fields = section_field($slug);
       
        $sdata = HomeSection::where('section_type', $slug)->get();
        $data = [];
        foreach($sdata as $s){
            $data[$s->meta_key] = $s->meta_value;
        }
        // dd($data);
        return view('admin.setting.home-section-edit',compact('data','fields','slug'));
    }

    public function update(Request $request, $slug)
    {
        // $data = $request->except('_token');
        $data = $request->all();
        // dd($data);
        foreach($data as $key => $value){
            $sdata = HomeSection::where('section_type', $slug)->where('meta_key', $key)->first();
            if($sdata){
                $sdata->meta_value = $value;
                $sdata->save();
            }else{
                // foreach($data as $key => $value){
                //     $sdata = new HomeSection();
                //     $sdata->section_type = $slug;
                //     $sdata->meta_key = $key;
                //     $sdata->meta_value = $value;
                //     $sdata->save();
                // }
                $sdata = new HomeSection();
                $sdata->section_type = $slug;
                $sdata->meta_key = $key;
                $sdata->meta_value = $value;
                $sdata->save();
            }
        }
        return redirect()->route('admin.home.section.edit', $slug)->with('success', 'Section updated successfully');
    }
}
