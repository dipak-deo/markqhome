<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\Contact;
use App\Models\PropertyInquery;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->page){
            return view(config('register')['page'][$request->page]['path']);
        }

        if($request->type && $request->slug && $request->target){
            $menu = config('register')['menu'][$request->type];
            
            if($request->target =='single'){
                $page_detail = $menu['model']::where('slug', $request->slug)
                ->first();
               
                if($page_detail !=NULL){
                    $data = $page_detail->get_data();
                }else{
                    $data = [];
                }
            }else{
                $page_detail = $menu['model']::where('slug', $request->slug)->first();
               
                if($page_detail !=NULL){
                    $data = $page_detail->get_data();
                   
                }else{
                    $data = [];
                }
               
              
            }

            return view('home.pages.'.$menu['view'], compact('page_detail','data'));
        }
        return view('home.index');
    }

    public function detail(Request $request, $id,$slug)
    {
        $con = config('register')['detail'][$request->type];
        $data = $con['model']::find($id);
        return view($con['path'],compact('data'));
    }


    public function contact_post(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
        ]);

        try{
            $data = $request->all();
            Contact::create($data);
            return redirect()->back()->with('success_message', 'Contact Us Message Success');
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }


    public function property_inquery(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'how_to_reach_us' => 'required',
        ]);

        try{
            $data = $request->all();
            PropertyInquery::create($data);
            return redirect()->back()->with('success_message', 'Property Inquery Message Success');
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }


}
