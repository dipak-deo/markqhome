<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'block_number',
        'block_title',
        'slug',
        'items',
        'buttons'
    ];

    protected $casts = [
        'items' => 'array',
        'buttons' => 'array'
    ];
}
