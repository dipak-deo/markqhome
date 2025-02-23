<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use App\Models\Property;
use App\Models\PropertyMeta;
use Str;
use Exception;

class PropertyCategoryController extends Controller
{
    public function index(Request $request)
    {
        $edit_data = [];
        if($request->edit){
            $edit_data = PropertyCategory::find($request->edit);
        }
        $category = PropertyCategory::orderBy('id','DESC')->get();
        return view('admin.property.category.index',compact('category','edit_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:property_categories,title'
        ]);

        try{
            $data = $request->all();
            $data['slug'] = Str::slug($data['title']);
            PropertyCategory::create($data);
            return redirect()->back()->with('success_message', 'Property Type Added Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            $data = PropertyCategory::find($id);
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

    public function edit($id)
    {
        $data =  PropertyCategory::find($id);
        return view('admin.property.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:property_categories,title,'.$id
        ]);
       

        try{
            $data = $request->all();
            // $data['slug'] = Str::slug($data['title']);
            PropertyCategory::find($id)->update($data);
            return redirect()->route('admin.property.category.index')->with('success_message', 'Property Type Updated Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }


}
