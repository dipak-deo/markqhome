<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use App\Models\Testmonial;
use Auth;
use Str;
use Exception;

class TestmonialController extends Controller
{
    public function index()
    {
        $testmonials = Testmonial::orderBy('id', 'desc')->get();
        return view('admin.testmonial.index', compact('testmonials'));
    }

    public function create()
    {
        return view('admin.testmonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'rating'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try{
            $data =  $request->all();
            if($data['rating'] > 5){
                return redirect()->back()->with('error_message', 'Rating must be less than or equal to 5.');
            }
            if($request->hasFile('image')){
                $data['image'] = Testmonial::uploadFile($data['image']);
            }

            if($request->hasFile('company_logo')){
                $data['company_logo'] = Testmonial::uploadFile($data['company_logo']);
            }
            $data['approved_by'] = Auth::user()->id;
            Testmonial::create($data);
            
            return redirect()->route('admin.testmonial.index')->with('success_message', 'Testmonial created successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }

        
    }

    public function delete($id)
    {
        try{
            $testmonial = Testmonial::findOrFail($id);
            Testmonial::deleteFile($testmonial->image);
            Testmonial::deleteFile($testmonial->company_logo);
            $testmonial->delete();
            return redirect()->back()->with('success_message', 'Testmonial deleted successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

}
