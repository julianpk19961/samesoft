<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MacroProcessesChilds extends Component
{
    // public $activeTab;
    // public $tabs;
    // public $items;
    // public $maxNameLength;

    protected $listeners = ['refreshTable' => '$refresh'];

    // public function setActiveTab($index)
    // {
    //     $this->activeTab = $index;
    // }

    // public function mount()
    // {
    //     $this->tabs = [
    //         'Macroprocesos' => 'Contenido de la Pestaña 1',
    //         'Areas' => 'Contenido de la Pestaña 2',
    //         'Politicas' => 'Contenido de la Pestaña 3',
    //     ];

    //     $this->activeTab = 'Macroprocesos';
    // }

    // public function getTabsProperty()
    // {
    //     return collect($this->tabs);
    // }

    public function render()
    {
        // $maxNameLength = 0;
        // foreach ($this->items as $item) {
        //     $nameLength = strlen($item->name);
        //     $maxNameLength = max($maxNameLength, $nameLength);
        // }

        // $items = $this->items->map(function ($item) use ($maxNameLength) {
        //     $item->paddedName = str_pad(strtolower($item->name), $maxNameLength, ' ');
        //     return $item;
        // });

        return view(
            'livewire.macro-processes-childs'
            // ,
            // [
            //     'items' => $items,
            // ]
        );
    }
}
