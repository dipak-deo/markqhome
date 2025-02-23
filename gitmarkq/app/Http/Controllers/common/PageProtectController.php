<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Protection;

class PageProtectController extends Controller
{
    public function index()
    {
        $protection = Protection::all();
        return view('admin.protection.index', compact('protection'));
    }

    public function create()
    {
        return view('admin.protection.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'protected_id' => 'required',
        ]);
        $data = $request->all();
        $isExist = Protection::where('protected_id', $data['protected_id'])->first();
        if ($isExist) {
            return redirect()->route('page_protection.index')->with('error_message', 'Protection already exists.');
        }
        $protection = Protection::create($data);
        return redirect()->route('page_protection.index')->with('success_message', 'Protection created successfully.');
    }

    public function delete($id)
    {
        $protection = Protection::find($id);
        $protection->delete();
        return redirect()->route('page_protection.index')->with('success_message', 'Protection deleted successfully.');
    
    }
    
}
