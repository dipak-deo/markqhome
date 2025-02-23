<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class PropertyInquery extends Model
{
    use HasFactory;

    protected $fillable =[
        'property_id',
        'property_type',
        'first_name',
        'last_name',
        'email',
        'phone',
        'how_to_reach_us',
        'location',
        'time_duretion',
        'message'
    ];

    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }
}
