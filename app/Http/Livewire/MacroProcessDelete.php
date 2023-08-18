<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Macro_Processes;
// PRUEBAS
use Illuminate\Support\Facades\log;
use Carbon\Carbon;

class MacroProcessDelete extends Component
{
    public $macroProcess, $deleteConfirm = false, $performDelete = true, $disableEjecte = true;

    protected $listeners = ['openMacro' => 'disableDelete'];


    public function mount($performDelete = true)
    {
        LOG::debug('MONTAR');
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

        $childs = $macroProcess->children() ?? [];
        $parents = $macroProcess->parents() ?? [];
        $performDelete = $this->performDelete;

        // $data = ([
        //     'REGISTRO: ' => $macroProcess->id,
        //     'DEPENDE DE: ' => $parents->count(),
        //     'DETALLES: ' => $childs->count(),
        //     'HABILITADO PARA ELIMINAR: ' => $performDelete
        // ]);



        if ($performDelete && ($childs->count() > 0 || $parents->count() > 0)) {
            $macroProcess->active = !$macroProcess->active;
            $macroProcess->save();
            $this->updateList();
            $data['ACCION'] = $macroProcess->active ? 'INACTIVADO' : 'ACTIVADO';
            LOG::debug($data);
            return false;
        }

        if ($performDelete) {
            $macroProcess->delete();
            $this->updateList();
        }

        // if (!$performDelete && $parents->count() > 0) {
        //     // $macroProcess->macroprocess_id = null;
        //     // $macroProcess->save();
        //     // $this->updateList();
        //     return false;
        // } elseif ($performDelete) {
        //     $data['ACCION'] = 'ELIMINA';
        //     // dd('SE ELIMINA');
        //     $macroProcess->delete();
        //     $this->updateList();
        // }

        // LOG::debug($data);
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
        return view('livewire.macro-process-delete');
    }
}
