<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'title',
        'slug',
        'description'
    ];

    protected $casts = [
        'description' => 'array'
    ];
}
