<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyMeta;
use Str;
use Exception;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('id','DESC')->get();
        return view('admin.property.index',compact('properties'));
    }

    public function create(Request $request)
    {
        if($request->cid){
            return get_state($request->cid);
        }
        if($request->sid){
            return get_cities($request->sid);
        }
        return view('admin.property.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'property_type_id' =>'required',
            'price' => 'required|numeric',
            'property_category' => 'required',
            // 'state_id' => 'required',
            // 'city_id' => 'required',
            'address_line_one' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
       
        
        try{
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            if($request->hasFile('image')){
                $data['image'] = Property::uploadFile($request->image);
            }

            if(isset($data['additional_image'])){
                foreach($data['additional_image'] as $key => $value){
                    $data['additional_image'][$key] = Property::uploadFile($value);
                }
            }
            if(isset($data['gallery_image'])){
                foreach($data['gallery_image'] as $key => $value){
                    $data['gallery'][$key] = Property::uploadFile($value);
                }
            }

            if(isset($data['property_meta_key'])){
                $data['property_meta'] = [];
            foreach($data['property_meta_key'] as $key => $value){
                $data['property_meta'][$value] =   $request->property_meta_value[$key];
            }
            }

            if(isset($data['meta_data_key'])){
                $data['additional_data'] = [];
            foreach($data['meta_data_key'] as $key => $value){
                $data['additional_data'][$value] =   $request->meta_data_value[$key];
            }
            }

            $lastInsert = Property::create($data);
            if($lastInsert){
                if(isset($data['property_category'])){
                    // $lastInsert->property_meta()->createMany($data['property_meta']);
                    foreach($request->property_category as $category){
                        PropertyMeta::create([
                            'property_id' => $lastInsert->id,
                            'meta_key' => 'category_id',
                            'meta_value' => $category,
                        ]);
                    }
                }

                if($request->hasFile('download_voucher')){
                    PropertyMeta::create([
                        'property_id' => $lastInsert->id,
                        'meta_key' => 'download_voucher',
                        'meta_value' => Property::uploadFile($request->download_voucher),
                    ]);
                }
                if($request->hasFile('download_floorplan')){
                    PropertyMeta::create([
                        'property_id' => $lastInsert->id,
                        'meta_key' => 'download_floorplan',
                        'meta_value' => Property::uploadFile($request->download_floorplan),
                    ]);
                }

                if($request->available_status){
                    PropertyMeta::create([
                        'property_id' => $lastInsert->id,
                        'meta_key' => 'available_status',
                        'meta_value' => $request->available_status,
                    ]);
                }

                // if($request->has(['beds','bath','garage','lot_width'])){
                    $all_keys = ['beds', 'bath', 'garage', 'lot_width','home_types'];
                    foreach($all_keys as $key){
                        if($request->$key){
                            PropertyMeta::create([
                                'property_id' => $lastInsert->id,
                                'meta_key' => $key,
                                'meta_value' => $request->$key,
                            ]);
                        }
                    }
                // }

                return redirect()->route('admin.property.index')->with('success_message', 'Property has been successfully created.');
            }
        }catch(Exception $e){
          
            return redirect()->back()->with('error_message', $e->getMessage());
        }
       
    }

    public function edit(Request $request, $id)
    {
        if($request->cid){
            return get_state($request->cid);
        }
        if($request->sid){
            return get_cities($request->sid);
        }
        $data = Property::find($id);
        return view('admin.property.edit',compact('data'));
    }


    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'property_type_id' =>'required',
            'price' => 'required|numeric',
            // 'property_category' => 'required',
            // 'address_line_one' => 'required',
            // 'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
       
        
        try{
            $property = Property::find($id);
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            if($request->hasFile('image')){
                Property::deleteFile($property->image);
                $data['image'] = Property::uploadFile($request->image);
            }
            // dd($property->additional_image);
            if(isset($data['additional_image'])){
                foreach($data['additional_image'] as $key => $value){
                    $data['additional_image'][$key] = Property::uploadFile($value);
                }
                $data['additional_image'] = array_merge($data['additional_image'],$property->additional_image);
            }
          
           
            // dd($data['additional_image']);
            if(isset($data['gallery_image'])){
                foreach($data['gallery_image'] as $key => $value){
                    $data['gallery'][$key] = Property::uploadFile($value);
                }
                $data['gallery'] = array_merge($data['gallery'], $property->gallery);
            }
            // dd($data['gallery']);
            

            if(isset($data['property_meta_key'])){
                $data['property_meta'] = [];
            foreach($data['property_meta_key'] as $key => $value){
                $data['property_meta'][$value] =   $request->property_meta_value[$key];
            }
            }

            if(isset($data['meta_data_key'])){
                $data['additional_data'] = [];
                // dd($request->meta_data_value);
            foreach($data['meta_data_key'] as $key => $value){
                $data['additional_data'][$value] =   $request->meta_data_value[$key];
            }
            }
            // dd($data);
            $property->update($data);
            // dd($property);
            if($property){
                if(isset($data['property_category'])){
                    PropertyMeta::where('property_id', $property->id)->where('meta_key', 'category_id')->delete();
                    foreach($request->property_category as $category){
                        PropertyMeta::create([
                            'property_id' => $property->id,
                            'meta_key' => 'category_id',
                            'meta_value' => $category,
                        ]);
                    }
                }

                if($request->hasFile('download_voucher')){
                    Property::deleteFile($property->get_meta('download_voucher')->download_voucher);
                   $download_voucher=  PropertyMeta::where('property_id', $property->id)
                    ->where('meta_key', 'download_voucher')->first();
                    if($download_voucher == NULL){
                        PropertyMeta::create([
                            'property_id' => $property->id,
                            'meta_key' => 'download_voucher',
                            'meta_value' => Property::uploadFile($request->download_voucher),
                        ]);
                    }else{
                        $download_voucher->update(['meta_value'=> Property::uploadFile($request->download_voucher)]);
                    }
                    // ->update(['meta_value'=> Property::uploadFile($request->download_voucher)]);
                   
                }
                if($request->hasFile('download_floorplan')){
                  
                   $download_floorplan = PropertyMeta::where('property_id', $property->id)
                    ->where('meta_key', 'download_floorplan')->first();
                    if($download_floorplan ==  NULL){
                        PropertyMeta::create([
                            'property_id' => $property->id,
                            'meta_key' => 'download_floorplan',
                            'meta_value' => Property::uploadFile($request->download_floorplan),
                        ]);
                    }else{
                        Property::deleteFile($property->get_meta('download_floorplan')->download_floorplan);
                        $download_floorplan->update(['meta_value'=> Property::uploadFile($request->download_floorplan)]);
                    }
                    // ->update(['meta_value'=> Property::uploadFile($request->download_floorplan)]);
                    // PropertyMeta::create([
                    //     'property_id' => $property->id,
                    //     'meta_key' => 'download_floorplan',
                    //     'meta_value' => Property::uploadFile($request->download_floorplan),
                    // ]);
                }

                if($request->available_status){
                    $available_status = PropertyMeta::where('property_id', $property->id)
                    ->where('meta_key', 'available_status')->first();
                        if($available_status ==  NULL){
                            PropertyMeta::create([
                                'property_id' => $property->id,
                                'meta_key' => 'available_status',
                                'meta_value' => $request->available_status,
                            ]);
                        }else{
                            
                            $available_status->update(['meta_value'=> $request->available_status]);
                        }
                }

                // update or create
                $all_keys = ['beds', 'bath', 'garage', 'lot_width','home_types'];
                foreach($all_keys as $key){
                    if($request->$key){
                        $property_meta = PropertyMeta::where('property_id', $property->id)
                        ->where('meta_key', $key)->first();
                        if($property_meta ==  NULL){
                            PropertyMeta::create([
                                'property_id' => $property->id,
                                'meta_key' => $key,
                                'meta_value' => $request->$key,
                            ]);
                        }else{
                            $property_meta->update(['meta_value'=> $request->$key]);
                        }
                    }
                }

                return redirect()->route('admin.property.index')->with('success_message', 'Property has been successfully updated.');
            }
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->with('error_message', $e->getMessage());
        }
       
    }

    public function delete_image(Request $request,$type)
    {
     
        if($type == 'additional_image'){
            $path = $request->path;
            $property_id = $request->property_id;
            $property = Property::findOrFail($property_id);
            $property_additional_image = $property->additional_image;
            if($property_additional_image !=NULL){
                foreach($property_additional_image as $key => $additional){
                    if($additional == $path){
                        // dd($property->gallery[$key]);
                        unset($property_additional_image[$key]);
                        Property::deleteFile($path);
                    }
                }
            }
            $property->additional_image = array_values($property_additional_image);
            $property->save();
            
        }elseif($type == 'gallery_image'){
            $path = $request->path;
            $property_id = $request->property_id;
            $property = Property::findOrFail($property_id);
            $property_gallery = $property->gallery;
            if($property_gallery !=NULL){
                foreach($property_gallery as $key => $gallery){
                    if($gallery == $path){
                        // dd($property->gallery[$key]);
                        unset($property_gallery[$key]);
                        Property::deleteFile($path);
                    }
                }
            }
            $property->gallery = array_values($property_gallery);
            $property->save();
           
        }
        return redirect()->back()->with('success_message', 'Image deleted successfully.');
      
    }


    public function edit_group(Request $request, $edit_type, $id)
    {

        try{
            if($edit_type){

                if($request->edit){
                    $edit_data = get_edit_group_model($edit_type)::find($request->edit);
                }else{
                    $edit_data = NULL;
                }
                $property =  Property::find($id);
                $datas = get_edit_group_model($edit_type)::where('property_id',$id)->get();
                return view('admin.property.edit-group.'.$edit_type, compact('datas','edit_data','property','edit_type'));
            }else{
                return redirect()->back()->with('error_message', 'Something went wrong.');
            }
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function update_group(Request $request, $edit_type, $id)
    {
        $request->validate([
            'price' => 'nullable|numeric'
        ]);
        try{
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            if($request->has('image')){
                $data['image'] =  get_edit_group_model($edit_type)::uploadFile($request->image);
            }
            if($request->meta_key){
                $loopdata = [];
                foreach($request->meta_key as $key => $value){
                    $arr =[];
                    $arr['uuid'] = rand(1000, 9999);
                    $arr['title'] =$value;
                    if($request->meta_value){
                        $arr['description'] = $request->meta_value[$key];
                    }
                    if($request->price_key){
                        $arr['price'] = $request->price_key[$key];
                    }
                    $loopdata[] = $arr;
                }
                // dd($loopdata);
                $data['description'] = $loopdata;
            }
            get_edit_group_model($edit_type)::create($data);
            return redirect()->back()->with('success_message', 'Data has been successfully added.');
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->with('error_message', $e->getMessage());
        }
        
    }

    public function update_group_items(Request $request, $edit_type, $id)
    {
        $request->validate([
            'price' => 'nullable|numeric'
        ]);
        
        
        try{
            $data = $request->all();
            $up = get_edit_group_model($edit_type)::find($id);
            // $data['slug'] = Str::slug($request->title);
            if($request->has('image')){
                get_edit_group_model($edit_type)::deleteFile($up->image);
                $data['image'] =  get_edit_group_model($edit_type)::uploadFile($request->image);
            }

            if($request->meta_key){
                $loopdata = [];
                foreach($request->meta_key as $key => $value){
                    $arr =[];
                    if($request->uuid){
                        $arr['uuid'] = $request->uuid[$key];
                    }
                    // else{
                    //     $arr['uuid'] = rand(1000, 9999);
                    // }
                    $arr['title'] =$value;
                    if($request->meta_value){
                        $arr['description'] = $request->meta_value[$key];
                    }
                    if($request->price_key){
                        $arr['price'] = $request->price_key[$key];
                    }
                    $loopdata[] = $arr;
                }
                // dd($loopdata);
                $data['description'] = $loopdata;
            }
           $up->update($data);
            // remove edit id from request
            $previousUrl = url()->previous();
            $cleanUrl = preg_replace('/(\?|&)edit=[^&]+(&|$)/', '$1', $previousUrl);
            $cleanUrl = rtrim($cleanUrl, '&');
            return redirect($cleanUrl)->with('success_message', 'Data has been successfully updated.');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }

    }


    public function delete_group_items(Request $request, $edit_type, $id)
    {
       try{
         
        $up = get_edit_group_model($edit_type)::find($id);
        if($request->has('image')){
            get_edit_group_model($edit_type)::deleteFile($up->image);
        }
        $up->delete();
        return redirect()->back()->with('success_message', 'Data has been successfully deleted.');
       }catch(Exception $e){
        return redirect()->back()->with('error_message', $e->getMessage());
       }
    }

}
