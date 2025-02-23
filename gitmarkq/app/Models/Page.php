<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Models\PageMeta;

class Page extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'image',
    ];

    public function get_template(){
        return PageMeta::where('page_id',$this->id)->where('meta_key','page_template')->first()->meta_value;
    }

    public function get_meta($meta_key){
        // return PageMeta::where('page_id', $this->id)->where('')
        $meta = PageMeta::where('page_id', $this->id)->where('meta_key', $meta_key)->first();
        return ($meta != null) ? $meta->meta_value : null;
    }

    public function image(){
        return ($this->image) ? url($this->image) : url('no_image.jpg');
    }

    public function get_data(){
        return $this;
    }

    public function template_data(){
       
        $data_type = $this->get_meta('data_types');
 
        if($data_type == 'category'){
            $cat_slug =  Category::where('slug', $this->get_meta('category_slug'))->first();
           
            if($cat_slug != null){
              
                $data = $cat_slug->get_data();
              
            }else{
                $data = [];
            }
        }
        return $data;
    }
}
