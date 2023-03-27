<?php

namespace App\Http\Livewire;

use App\Models\macro_processes;
use Livewire\Component;
use Mail;

class MacroProcessForm extends Component
{

    public $name;
    public $macroprocess_id;
    public $description;

    protected $rules = [
        'name' => ['required', 'unique:macro_processes', 'min:5'],
    ];

    public function macroProcessSubmit()
    {
        $this->validate();

        macro_processes::create([
            'name' => $this->name,
            'description' => $this->description,
            'macroprocess_id' => $this->macroprocess_id
        ]);
        $this->clearFields();
    }

    public function clearFields()
    {
        $this->name = '';
        $this->macroprocess_id = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.macro-process-form');
    }
}
