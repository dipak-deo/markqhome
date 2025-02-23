<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\Page;
use App\Models\AwardFormData;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $all_support = Support::where('is_viewed',0)->orderBy('id','DESC')->take(10)->get();
        $latest_posts = Post::orderBy('id', 'DESC')->take(10)->get();
        $latest_pages = Page::orderBy('id', 'DESC')->take(10)->get();
        $latest_awards = AwardFormData::orderBy('id', 'DESC')->take(10)->get();
        foreach($latest_awards as $items){
            $award_cat =[];
            // award_category_id
            $award_cat_items = json_decode($items->award_category_id);
           
            foreach($award_cat_items as $value){
                $award_cat[] = award_category_detail($value)->name ?? 'n/a';
            }
            // dd($award_cat);
            $items->award_category = implode(',',$award_cat);
            
        }
        // dd($latest_awards);
        return view('admin.index',compact('all_support','latest_posts','latest_pages','latest_awards'));
    
    }
}
