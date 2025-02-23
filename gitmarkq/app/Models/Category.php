<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostMeta;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'is_delete',
        'status',
        'order'
    ];

    public function get_posts(){
    
        return Post::whereHas('postMeta', function ($query) {
            $query->where('meta_key', 'category_id')
                  ->where('meta_value', $this->id); 
        });
    }
    public function get_data(){
    
        return Post::whereHas('postMeta', function ($query) {
            $query->where('meta_key', 'category_id')
                  ->where('meta_value', $this->id);
        })->get();
    }

}
