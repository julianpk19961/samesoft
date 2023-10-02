<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Macro_Processes;
// PRUEBAS
use Illuminate\Support\Facades\log;
use Carbon\Carbon;
use Livewire\Livewire;

class MacroProcessDelete extends Component
{
    public $macroProcess, $deleteConfirm = false, $performDelete = true, $disableEjecte = true;

    protected $listeners = ['openMacro' => 'disableDelete'];


    public function mount($performDelete = true)
    {
        $this->performDelete = $performDelete;
    }


    public function setDeleteIdButton()
    {
        $this->emit('updateButton');
    }

    public function updateList()
    {
        $this->emit('updateList');
    }

    public function delete(Macro_Processes $macroProcess)
    {

        $childs = $macroProcess->children ?? [];
        $parents = $macroProcess->parents ?? [];
        $documents = $macroProcess->documents ?? [];

        $performDelete = $this->performDelete;

        if ($performDelete && ($childs->count() > 0 || $documents->count() > 0)) {
            $macroProcess->active = !$macroProcess->active;
            $macroProcess->save();
            $this->updateList();
        }

        if ($performDelete) {
            $macroProcess->delete();
        }
        $this->updateList();
    }

    public function disableDelete($macroProcess)
    {
        return false;
    }

    public function render()
    {
        return view('livewire.macroprocess.macro-process-delete');
    }
}
