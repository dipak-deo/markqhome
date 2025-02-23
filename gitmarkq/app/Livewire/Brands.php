<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
class Brands extends Component
{
    public function render()
    {
        $categories = Category::where('slug','brands')->first();
       
        if($categories){
            $brands = Post::join('post_metas',function($join) use($categories){
                $join->on('posts.id','=','post_metas.post_id')
                ->where('post_metas.meta_key', '=', 'category_id')
                ->where('post_metas.meta_value', '=', $categories->id);
            })
            ->select('posts.*')
            ->take(3)
            ->orderBy('posts.id', 'desc')
            ->get();
        }else{
            $brands = [];
        }
        return view('livewire.brands',compact('brands'));
    }
}
