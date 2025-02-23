<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        try{
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            $data['order'] = Category::max('order') + 1;
            Category::create($data);
            return redirect()->route('category.index')->with('success_message','Category created successfully.');
        }catch(\Exception $e){
            dd($e);
            return redirect()->back()->with('error_message', $e->getMessage());
        }
        
    }

    public function delete($id)
    {
      try{
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success_message','Category deleted successfully.');
      }catch(\Exception $e){
        return redirect()->back()->with('error_message', $e->getMessage());
      }
    }

    public function edit($id)
    {
        $data = Category::findorFail($id);
        return view('admin.category.edit',compact('data'));
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
       try{
        $data = $request->all();
        Category::find($id)->update($data);
        return redirect()->route('category.index')->with('success_message','Category updated successfully.');
       }catch(\Exception $e){
        return redirect()->back()->with('error_message', $e->getMessage());
       }
    
    }
}
