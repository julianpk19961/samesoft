<?php

namespace App\Http\Livewire;

use App\Models\areas;
use Livewire\Component;
use App\Models\macro_processes;

use Illuminate\Support\Facades\Log;


class Dashboard extends Component
{
    public $MacroProcesses, $filters, $currentKeyArea, $selectedArea, $showModal = false;

    public function getMacroProcessesProperty()
    {
        $query = macro_processes::all();
        return $query;
    }

    public function showDocumentsMacroProcess(macro_processes $macroProcesses)
    {
        $showModal = true;
    }

    // areas $area
    public function showDocumentsAreas(areas $area)
    {
        $this->selectedArea = $area;
        $this->showModal = !$this->showModal;
    }


    public function closeDocumentsModal()
    {

        $this->showModal = !$this->showModal;

        // if (isset($this->selectedArea)) {
        // }elseif
    }


    public function render()
    {
        return view('livewire.index.dashboard');
    }
}
