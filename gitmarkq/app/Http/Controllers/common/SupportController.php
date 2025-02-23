<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    public function index()
    {
        $support = Support::orderBy('id','desc')->get();
        return view("admin.support.index",compact("support"));
    }

    public function show($id)
    {
        $data = Support::findorFail($id);
        return view("admin.support.show",compact("data"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "reply"=> "required",
            "remarks"=> "required",
        ]);
        $support = Support::findorFail($id);
        $data = $request->all();
        // $data['is_viewed'] = 1;
        $support->update($data);
        return redirect()->route('support.index')->with('success_message','data update successfully');
    }
}
