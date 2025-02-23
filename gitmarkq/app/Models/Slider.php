<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class Slider extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'status',
        'order'
    ];
}
