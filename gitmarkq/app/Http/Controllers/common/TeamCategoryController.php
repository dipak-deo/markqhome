<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamCategory;
use App\Models\Team;
use Str;

class TeamCategoryController extends Controller
{
    public function index()
    {
        $team_categories = TeamCategory::all();
        return view('admin.team.category.index', compact('team_categories'));
    }

    public function create()
    {
        return view('admin.team.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:team_categories,name',
        ]);
        $data = $request->all();
        if($request->is_display_home_page){
            $data['is_display_home_page'] = 1;
        }else{
            $data['is_display_home_page'] = 0;
        }
        $data['slug'] = Str::slug($request->name);
        TeamCategory::create($data);
        return redirect()->route('team.category.index')->with('success_message', 'Category created successfully');
    }

    public function edit($id)
    {
        $data = TeamCategory::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:team_categories,name,' . $id,
        ]);

        $category = TeamCategory::findOrFail($id);
        $data = $request->all();
        if($request->is_display_home_page){
            $data['is_display_home_page'] = 1;
        }else{
            $data['is_display_home_page'] = 0;
        }
        $category->update($data);

        return redirect()->route('team.category.index')->with('success_message', 'Category updated successfully');
    }

    public function delete($id)
    {
        $category = TeamCategory::findOrFail($id);
        Team::where('team_category_id', $id)->update(['team_category_id' => null]);
        $category->delete();

        return redirect()->route('team.category.index')->with('success_message', 'Category deleted successfully');
    }
}
