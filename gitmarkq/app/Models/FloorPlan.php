<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    use HasFactory;

    protected $fillable = [
       'property_id',
       'title',
       'slug',
       'image',
       'upgrate_type',
       'price',
       'area',
       'beds',
       'bath',
       'garage',
       'lot_width'
    ];
}
