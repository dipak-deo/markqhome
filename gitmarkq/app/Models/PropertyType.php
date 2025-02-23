<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Traits\CommonTrait;
use App\Models\Property;

class PropertyType extends Model
{
    use HasFactory,CommonTrait,FilesystemTrait;

    protected $fillable = [
        'title',
        'slug',
        'images',
        'description',
        'status'
    ];

    public function property(){
        return $this->hasMany(Property::class,'property_type_id','id');
    }

    public function get_data(){
        return Property::where('property_type_id',$this->id)->get();
    }
}
