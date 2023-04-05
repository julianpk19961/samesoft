<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use app\Models\macro_processes;

class MacroProcessDelete extends Component
{

    public $macroProcesses, $deleteConfirm = false;

    public function __construct($macroProcesses)
    {

        $this->macroProcesses = macro_processes::find($macroProcesses);
    }


    public function delete(macro_processes $deleteMacroProcess)
    {
        DB::transaction(function () use ($deleteMacroProcess) {
            // $this->delete
        });
    }

    /* Open depend macroprocess */
    public function openChild($deleteMacroProcess)
    {
        $deleteMacroProcess->children->each(function (macro_processes $macro_process) {
            $macro_process->macroprocess_id = null;
        });
    }

    public function render()
    {
        return view('livewire.macro-process-delete');
    }
}
