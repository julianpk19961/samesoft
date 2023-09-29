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
            $data['ACCION'] = $macroProcess->active ? 'INACTIVADO' : 'ACTIVADO';
            LOG::debug($data);
            return false;
        }

        if ($performDelete) {
            $macroProcess->delete();
        }
        $this->updateList();
    }

    public function disableDelete($macroProcess)
    {
        return false;
        // if ($this->disableEjecte) {

        //     LOG::debug(['Recepción - disableDelete - OPEN' => $macroProcess]);
        //     $this->disableEjecte = false;
        //     return false;
        // }
        // $this->$macroProcess = Macro_Processes::findOrFail($macroProcess);
        // $this->macroProcess = $macroProcess;

        // $this->performDelete = false;
        // $this->delete($macroProcess);
    }

    public function render()
    {
        return view('livewire.macroprocess.macro-process-delete');
    }
}
