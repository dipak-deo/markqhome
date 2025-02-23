<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyMeta;
use App\Models\Property;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'icon',
        'description',
        'order',
        'status',
        'page_template',
        'detail_template'
    ];

    public function get_data(){
    
        return Property::whereHas('PropertyMeta', function ($query) {
            $query->where('meta_key', 'category_id')
                  ->where('meta_value', $this->id); 
        })->get();
    }
}
