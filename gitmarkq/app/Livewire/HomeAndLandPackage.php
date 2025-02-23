<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyType;

class HomeAndLandPackage extends Component
{
    public function render()
    {
        $type = PropertyType::where('slug','home-land')->first();
      
        if($type !=NULL){
            $peroperty = Property::where('property_type_id', $type->id)
            ->take(3)
            ->orderBy('id', 'DESC')
            ->get();
        }else{
            $peroperty = [];
        }
        return view('livewire.home-and-land-package',compact('peroperty'));
    }
}
