<?php

namespace App\Http\Livewire;

use App\Models\macro_processes;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Mail;

class MacroProcessForm extends Component
{

    public $name, $macroprocess_id, $description, $icons, $icon, $confirming = false;

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
            'macroprocess_id' => isset($this->macroprocess_id) ? $this->macroprocess_id : null,
            'icon' => isset($this->icon) ? $this->icon : null
        ]);

        $this->clear();
        session()->flash('message', 'El registro has sido guardado de forma exitosa');
        $this->macroProcessesListSet();
        
    }

    public function clear()
    {
        $this->name = '';
        $this->macroprocess_id = '';
        $this->description = '';
        $this->confirming = false;
    }

    public function macroProcessesListSet()
    {
        $this->emit('updateList');
    }

    public function getIcons()
    {
        return collect(File::files(resource_path('views\components\svg\macroprocess')))
            ->map(function ($file) {
                return str_replace('.blade.php', '', $file->getFilename());
            });
    }

    public function render()
    {
        $macroProcesses = macro_processes::all();
        $svgIcons = $this->getIcons();
        return view('livewire.macro-process-form', compact('macroProcesses', 'svgIcons'));
    }
}
