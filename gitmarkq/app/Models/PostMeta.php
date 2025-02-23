<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'meta_key',
        'meta_value',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
