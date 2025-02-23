<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        if($request->hasFile('image')){
            $data['image'] = Team::uploadFile($data['image']);
        }
        $team = Team::create($data);
        return redirect()->route('team.index')->with('success_message', 'Team created successfully.');
        
    }

    public function edit($id)
    {
        $data = Team::findorFail($id);
        return view('admin.team.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $team = Team::findorFail($id);
        $data = $request->all();
        if($request->hasFile('image')){
            Team::deleteFile($team->image); //delete old file
            $data['image'] = Team::uploadFile($data['image']);
        }
       
        $team->update($data);
        return redirect()->route('team.index')->with('success_message', 'Team updated successfully.');
    }

    public function delete($id)
    {
        $team = Team::findorFail($id);
        Team::deleteFile($team->image);
        $team->delete();
        return redirect()->route('team.index')->with('success_message', 'Team deleted successfully.');
    }

}
