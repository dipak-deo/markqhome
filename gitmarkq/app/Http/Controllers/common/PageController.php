<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use App\Models\Page;
use App\Models\PageMeta;
use Exception;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::orderBy('id','DESC')->get();
        return view('admin.page.index', compact('page'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'content' => 'required',
        ]);
        // dd($request->all());
        try{
            if($request->page_template !='default' && $request->page_template !="template-faqs"){
                $request->validate([
                    'data_types' => 'required',
                    'category_slug'=> 'required',
                ]);
            }
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            if($request->hasFile('image') && $request->file('image')->isValid() == true){
            $data['image'] = Page::uploadFile($data['image']);
            }
            $lastInsert =  Page::create($data);
            if($request->page_template !='default' && $request->page_template !="template-faqs"){
                PageMeta::create([
                    'meta_key' => 'page_template',
                    'meta_value' => $request->page_template,
                    'page_id' => $lastInsert->id
                ]);
                PageMeta::create([
                    'meta_key' => 'data_types',
                    'meta_value' => $request->data_types,
                    'page_id' => $lastInsert->id
                ]);
                PageMeta::create([
                    'meta_key' => 'category_slug',
                    'meta_value' => $request->category_slug,
                    'page_id' => $lastInsert->id
                ]);
            }else{
                PageMeta::create([
                    'meta_key' => 'page_template',
                    'meta_value' => $request->page_template,
                    'page_id' => $lastInsert->id
                ]);
            }
           
            return redirect()->route('page.index')->with('success_message', 'Page created successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error_message',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.page.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'content' => 'required',
        ]);

       try{
            if($request->page_template !='default' && $request->page_template !="template-faqs"){
                $request->validate([
                    'data_types' => 'required',
                    'category_slug'=> 'required',
                ]);
            }
            $page = Page::findOrFail($id);
            $data = $request->all();
            // $data['slug'] = Str::slug($request->title);
            if($request->hasFile('image') && $request->file('image')->isValid() == true){
                Page::deleteFile($page->image);
            $data['image'] = Page::uploadFile($data['image']);
            }
            $page->update($data);
            // update or create
            if($request->page_template !='default' && $request->page_template !='template-faqs'){
                PageMeta::updateOrCreate(
                    ['page_id' => $page->id, 'meta_key' => 'page_template'],
                    ['meta_value' => $request->page_template]
                );
                PageMeta::updateOrCreate(
                    ['page_id' => $page->id, 'meta_key' => 'data_types'],
                    ['meta_value' => $request->data_types]
                );
                PageMeta::updateOrCreate(
                    ['page_id' => $page->id, 'meta_key' => 'category_slug'],
                    ['meta_value' => $request->category_slug]
                );
            }else{
                PageMeta::updateOrCreate(
                    ['page_id' => $page->id, 'meta_key' => 'page_template'],
                    ['meta_value' => $request->page_template]
                );
            }

            return redirect()->route('page.index')->with('success_message', 'Page updated successfully.');
       }catch(Exception $e){
        return redirect()->back()->with('error_message', $e->getMessage());
       }
    }

    public function delete($id)
    {
        // dd("hello");
        $page = Page::findOrFail($id);
        Page::deleteFile($page->image);
        $page->delete();
        return redirect()->route('page.index')->with('success_message', 'Page deleted successfully.');
    
    }

    public function data_category(Request $request)
    {
        $data_type = $request->data_type;
        if($data_type == 'category'){
            $data = model_path('Category')::where('status', 'publish')->get();
            return response()->json($data);
        }else{
            $data = model_path('PropertyCategory')::where('status', 'publish')->get();
            return response()->json($data);
        }
    }
        
}
