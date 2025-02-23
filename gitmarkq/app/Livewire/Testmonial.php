<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testmonial as TestmonialModal;

class Testmonial extends Component
{
    public function render()
    {
        $test = TestmonialModal::where('status', 'publish')->orderBy('id','desc')->take(10)->get();
        return view('livewire.testmonial',compact('test'));
    }
}
