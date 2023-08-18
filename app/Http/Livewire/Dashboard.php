<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\macro_processes;

class Dashboard extends Component
{
    public $MacroProcesses, $filters;

    public function getMacroProcessesProperty()
    {
        $query = macro_processes::all();
        return $query;
    }

    public function render()
    {
        $this->MacroProcesses = $this->getMacroProcessesProperty();

        return view('livewire.index.dashboard');
    }
}
