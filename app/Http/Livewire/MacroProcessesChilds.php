<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MacroProcessesChilds extends Component
{

    // listado de items
    public $styles = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'];


    public function render()
    {
        return view('livewire.macro-processes-childs');
    }
}
