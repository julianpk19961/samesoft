<?php

namespace App\Http\Livewire;

use App\Models\macro_processes;
use Livewire\Component;
use Mail;

class MacroProcessForm extends Component
{

    public $name, $macroprocess_id, $description;

    protected $rules = [
        'name' => ['required', 'unique:macro_processes', 'min:5'],
    ];

    public function submit()
    {

        $this->validate([
            'name' => ['required', 'unique:macro_processes', 'min:5']
        ]);

        macro_processes::create([
            'name' => $this->name,
            'description' => $this->description,
            'macroprocess_id' => $this->macroprocess_id
        ]);
        // $macroProcess = new macro_processes();
        // $macroProcess->name = $this->name;
        // $macroProcess->description = $this->description;
        // $macroProcess->macroprocess_id = $this->macroprocess_id;
        // $macroProcess->save();

        $this->clear();
    }

    public function clear()
    {
        $this->name = '';
        $this->macroprocess_id = '';
        $this->description = '';
    }

    public function render()
    {
        $macroProcesses = macro_processes::all();
        return view('livewire.macro-process-form', compact('macroProcesses'));
    }
}
