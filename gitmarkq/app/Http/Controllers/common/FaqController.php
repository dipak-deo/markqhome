<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $data = $request->all();
        Faq::create($data);
        return redirect()->route('faq.index')->with('success_message', 'Faq created successfully.');
    }

    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('data'));
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $data = $request->all();
        Faq::find($id)->update($data);
        return redirect()->route('faq.index')->with('success_message', 'Faq updated successfully.');
    
    }

    public function delete($id)
    {
        Faq::find($id)->delete();
        return redirect()->route('faq.index')->with('success_message', 'Faq deleted successfully.');
    }
}
