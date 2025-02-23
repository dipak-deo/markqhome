<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $email_templates = EmailTemplate::all();
        return view('admin.email.index', compact('email_templates'));
    }

    public function create()
    {
        return view('admin.email.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = $request->all();
        EmailTemplate::create($data);
        return redirect()->route('email_template.index')->with('success_message', 'Email Template created successfully');
    }

    public function edit($id)
    {
        $data = EmailTemplate::find($id);
        return view('admin.email.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = $request->all();
        EmailTemplate::find($id)->update($data);
        return redirect()->route('email_template.index')->with('success_message', 'Email Template updated successfully');
    }

    public function delete($id)
    {
        EmailTemplate::find($id)->delete();
        return redirect()->route('email_template.index')->with('success_message', 'Email Template deleted successfully');
    }
}
