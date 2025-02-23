<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function site_setting(Request $request)
    {
        // request method post
        if ($request->isMethod('post')) {
            $request->validate([
                'phone' => 'max:255'
            ]);
            $data = $request->all();
            foreach ($data as $key => $value) {
               
              $setting['meta_key'] = $key;
              $setting['meta_value'] = $value;
              $setting['autoload'] = 'yes';
              $isExist = Setting::where('meta_key', $key)->first();
              if ($isExist) {
                if($key == 'logo'){
                    $logo = $value;
                    Setting::deleteFile($isExist->meta_value);
                    $setting['meta_value'] = Setting::uploadFile($logo);
                }
                if($key == 'fabicon'){
                    $fabicon = $value;
                    Setting::deleteFile($isExist->meta_value);
                    $setting['meta_value'] = Setting::uploadFile($fabicon);
                }
                Setting::where('meta_key', $key)->update($setting);
              } else {
                if($key == 'logo'){
                    $logo = $value;
                    $setting['meta_value'] = Setting::uploadFile($logo);
                }
                if($key == 'fabicon'){
                    $fabicon = $value;
                    $setting['meta_value'] = Setting::uploadFile($fabicon);
                }
                Setting::create($setting);
              }
          
            
            }
            // dd($data);
            return redirect()->route('site.setting')->with('success_message', 'Site Setting Updated Successfully'); 
        
        }
        $site_setting = Setting::all();
        $result = [];
        foreach ($site_setting as $key => $value) {
            $result[$value->meta_key] = $value->meta_value;
        }
        // $tt = Setting::where('meta_key', 'logo')->first();
        // dd($tt->meta_value);
        // dd($result);
        return view('admin.setting.site_setting', compact('result'));
    
    }
}
