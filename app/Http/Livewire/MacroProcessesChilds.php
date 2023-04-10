<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MacroProcessesChilds extends Component
{



    // listado de items
    public $styles = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'];
    public $position = 0, $items;


    public function moveLeft()
    {
        $this->position = max($this->position - 1, 0);
    }

    public function moveRight()
    {
        $this->position = min($this->position + 1, count($this->items) - 8);
    }


    public function render()
    {
        return view('livewire.macro-processes-childs', [
            'items' => $this->items
        ]);
    }
}
