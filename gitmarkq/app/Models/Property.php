<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Traits\CommonTrait;
use App\Models\PropertyType;
use App\Models\PropertyMeta;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\FloorPlan;

class Property extends Model
{
    use HasFactory,FilesystemTrait,CommonTrait;

    protected $fillable = [
        'property_type_id',
        'title',
        'slug',
        'image',
        'price',
        'description',
        'gallery',
        'additional_image',
        'floor_plan',
        'additional_data',
        'property_meta',
        'map_ifreme',
        'agent_id',
        'country_id',
        'state_id',
        'city_id',
        'address_line_one',
        'address_line_two',
        'zip_code',
        'status'
    ];


    protected $casts = [
        'gallery' => 'array',
        'additional_image' => 'array',
        'floor_plan' => 'array',
        'additional_data' => 'array',
        'property_meta' => 'array'
    ];

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class,'property_type_id','id');
    }

    public function image(){
        return ($this->image) ? url($this->image) : url('no_image.jpg');
    }

    public function get_gallery(){
        return $this->gallery;
    }

    public function get_additional_image(){
        return $this->additional_image;
    }

    public function PropertyMeta(){
        return $this->hasMany(PropertyMeta::class, 'property_id', 'id');
    }

    public function has_checked_category($category_id){
        // return $this->PropertyMeta->where('category_id',$category_id)->count();
        $is_exist = PropertyMeta::where('property_id', $this->id)->where('meta_key','category_id')
        ->where('meta_value', $category_id)->first();
        return ($is_exist) ? true : false;
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function get_meta($meta_key){
        return PropertyMeta::where('property_id', $this->id)->where('meta_key', $meta_key)->first()->meta_value ?? null;
    }

    public function __get_meta($meta_key,$meta_value = NULL)
    {
        $init =  PropertyMeta::where('property_id',$this->id)->where('meta_key',$meta_key);
        if ($meta_value !=NULL) {
            $data = $init->where('meta_value', $meta_value)->first();
        }else{
            $data = $init->first();
        }
        return $data;
        
        
    }

    public function get_similar_product($limit =3){
        // get like operator , in prooperty title where filtred by property types
        return Property::where('property_type_id', $this->property_type_id)->where('title', 'LIKE', '%'.$this->title.'%')
        ->take($limit)->orderBy('id','DESC')->get(); 
    }

    public function get_floorplan(){
        return $this->hasMany(FloorPlan::class, 'property_id', 'id');
    }
}
