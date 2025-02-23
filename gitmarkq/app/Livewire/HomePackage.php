<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyType;

class HomePackage extends Component
{
    public function render()
    {
        $type = PropertyType::where('slug','home')->first();
      
        if($type !=NULL){
            $peroperty = Property::where('property_type_id', $type->id)
            ->take(5)
            ->orderBy('id', 'DESC')
            ->get();
        }else{
            $peroperty = [];
        }
        return view('livewire.home-package',compact('peroperty'));
    }
}
