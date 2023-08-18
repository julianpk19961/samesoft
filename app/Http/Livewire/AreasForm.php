<?php

namespace App\Http\Livewire;

use App\Models\macro_processes;
use App\Models\areas;
use Livewire\Component;


class AreasForm extends Component
{

    public $MacroProcesses, $areas, $name, $macro_process_id, $description;
    public $confirming = false;

    protected $rules = [
        'name' => ['required', 'unique:areas', 'min:3'],
        'macro_process_id' => ['required']
    ];

    protected $messages = [
        'macro_process_id.required' => 'El campo Macroproceso Asignado es obligatorio'
    ];

    public function getMacroProcessesProperty()
    {
        return macro_processes::all();
    }

    public function submit()
    {

        $this->confirming = false;
        $this->validate();

        $data = [
            'name' => strtoupper($this->name),
            'macro_process_id' => strtoupper($this->macro_process_id),
            'description' => $this->description,
            'active' => True
        ];

        areas::create($data);
        $this->clear();
        $this->emit('updateList');
    }

    public function clear()
    {
        $this->name = '';
        $this->macro_process_id = '';
        $this->description = '';
    }

    public function render()
    {
        $this->MacroProcesses = $this->getMacroProcessesProperty();

        return view('livewire.areas.areas-form');
    }
}
