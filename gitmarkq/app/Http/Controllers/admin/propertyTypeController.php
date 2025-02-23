<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use Str;
use Exception;

class propertyTypeController extends Controller
{
    public function index(Request $request)
    {
        $edit_data = [];
        if($request->edit){
            $edit_data = PropertyType::find($request->edit);
        }
        $property_type = PropertyType::orderBy('id','DESC')->get();
        return view('admin.property.type.index',compact('property_type','edit_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:property_types,title'
        ]);

        try{
            $data = $request->all();
            $data['slug'] = Str::slug($data['title']);
            PropertyType::create($data);
            return redirect()->back()->with('success_message', 'Property Type Added Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            $data = PropertyType::find($id);
            if($data->slug == 'default'){
                return redirect()->back()->with('error_message','Cannot delete Default category');
            }else{
                $chcek_property = Property::where('property_type_id',$id)->get();
                if($chcek_property->isNotEmpty()){
                    foreach($chcek_property as $ch){
                        $ch->property_type_id = $data->get_category_by_slug('default')->id;
                    }
                }
            }
            
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:property_types,title,'.$id
        ]);

        try{
            $data = $request->all();
            // $data['slug'] = Str::slug($data['title']);
            PropertyType::find($id)->update($data);
            return redirect()->route('admin.property.type.index')->with('success_message', 'Property Type Updated Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }
}
