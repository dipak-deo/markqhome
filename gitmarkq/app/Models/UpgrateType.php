<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgrateType extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'title',
        'description',
        'price'
    ];

    protected $casts = [
        'description' => 'array'
    ];
}
