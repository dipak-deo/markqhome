<?php
namespace App\Traits;

trait CommonTrait {

    public function get_category_by_slug($slug){
        
        $model = class_basename(get_class());  
        $modelnamespace = '\App\Models\\'.$model;
        $findData = $modelnamespace::where('slug',$slug); 
        return $findData;
        // return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

}