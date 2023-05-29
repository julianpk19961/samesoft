<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MacroProcessesChilds extends Component
{



    // listado de items
    // public $styles = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'];
    // public $position = 0, $items, $empty= [];
    public $activeTab;
    public $tabs;
    public $items;

    public function setActiveTab($index)
    {
        $this->activeTab = $index;
    }

    public function mount()
    {
        $this->tabs = [
            'Macroprocesos' => 'Contenido de la Pestaña 1',
            'Areas' => 'Contenido de la Pestaña 2',
            'Politicas' => 'Contenido de la Pestaña 3',
        ];

        $this->activeTab = 'Macroprocesos';
    }

    public function render()
    {
        return view('livewire.macro-processes-childs');
    }
}
