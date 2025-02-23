<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Models\Category;
use App\Models\PostMeta;

class Post extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'image',
        'description',
        'status',
    ] ;

    public function category(){
        return $this->belongsToMany(Category::class, 'post_metas', 'post_id', 'meta_value')
                ->wherePivot('meta_key', 'category_id');
    }

    public function the_field($meta_key){
        return $this->belongsTo(PostMeta::class, 'id', 'post_id')
                ->where('meta_key', $meta_key)
                ->first();
    }

    public function postMeta(){
        
        return $this->hasMany(PostMeta::class, 'post_id','id');
    }
    public function image(){
        return ($this->image) ? url($this->image) : url('no_image.jpg');
    }
}
