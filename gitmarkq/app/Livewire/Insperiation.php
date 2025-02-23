<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;

class Insperiation extends Component
{
    public function render()
    {
        $categories = Category::where('slug','inspirations')->first();
       
        if($categories){
            $blogs = Post::join('post_metas',function($join) use($categories){
                $join->on('posts.id','=','post_metas.post_id')
                ->where('post_metas.meta_key', '=', 'category_id')
                ->where('post_metas.meta_value', '=', $categories->id);
            })
            ->select('posts.*')
            ->take(3)
            ->orderBy('posts.id', 'desc')
            ->get();
        }else{
            $blogs = [];
        }
        return view('livewire.insperiation',compact('blogs'));
    }
}
