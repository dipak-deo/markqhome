<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermalinkController extends Controller
{
    public function permalink(Request $request,$type,$id)
    {

        if($type == 'custom_link'){

            if($request->slug == NULL){
                return redirect()->back();
            }else{
                return redirect($request->slug);
            }

        }
        $con = config('register')['menu'][$type];
        $data = false;
        $page_detail = '';
        if($con){
            $data = $con['model']::find($id)->get_data();

            $page_detail = $con['model']::find($id);
            if($type == 'page'){
              
                    $page_template = $page_detail->get_template();
                    foreach(config('register')['page-template'] as $temp){
 
                        if($temp['slug'] == $page_template){
                            if($page_template !='default' && $page_template != 'template-faqs'){

                                $data = $data->template_data();
            
                            }
                           return view($temp['blade_path'],compact('data','page_detail'));
                        }
                    }
            }

            if($type == 'property_category'){
                $page_detail = $con['model']::find($id);
                // dd($page_detail);
                    if($page_detail->page_template !='default'){
                         if (\View::exists('home/templates.' . $page_detail->page_template)) {
                                return view('home/templates.' . $page_detail->page_template, compact('data','page_detail'));
                            }
                    }
            }
        }
       
        return view('home.pages.'.$con['view'],compact('data','page_detail'));
        
    }


}
