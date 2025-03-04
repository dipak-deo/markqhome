<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableDataComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $metadata;
    public function __construct($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
       
        return view('components.table-data-component');
    }
}
