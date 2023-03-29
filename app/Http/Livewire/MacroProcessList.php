<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\macro_processes;

class MacroProcessList extends Component
{
    public $macroProcesses;


    protected $listeners = ['updateList' => 'render'];

    public function render()
    {

        // 
        return view('livewire.macro-process-list');
    }
}
