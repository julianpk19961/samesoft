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
            'name' => strtoupper($this->name),
            'description' => $this->description,
            'macroprocess_id' => isset($this->macroprocess_id) ? $this->macroprocess_id : null
        ]);

        $this->clear();
        session()->flash('message', 'El registro has sido guardado de forma exitosa');
    }

    public function clear()
    {
        $this->name = '';
        $this->macroprocess_id = '';
        $this->description = '';
    }

    public function macroProcessesListSet()
    {
        $this->emit('updateList');
    }

    public function render()
    {
        $this->macroProcessesListSet();
        $macroProcesses = macro_processes::all();
        return view('livewire.macro-process-form', compact('macroProcesses'));
    }
}
