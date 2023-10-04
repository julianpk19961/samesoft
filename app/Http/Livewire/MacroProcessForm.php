<?php

namespace App\Http\Livewire;

use App\Models\macro_processes;
use Livewire\Component;
use App\http\Livewire\getIcons;
use Illuminate\Support\Facades\File;
use Mail;

class MacroProcessForm extends Component
{

    public $name,
        $macroprocess_id = null,
        $description,
        $icons,
        $selectedIcon = null,
        $confirming = false,
        $MacroProcesses,
        $svgIcons;

    protected $rules = [
        'name' => ['required', 'unique:macro_processes', 'min:5', 'max:20'],
        'description' => ['max:255'],
    ];

    public function getMacroProcessesProperty()
    {
        return macro_processes::all();
    }

    public function getSvgIconsProperty()
    {
        return getIcons::getSvgIcons();
    }

    public function submit()
    {
        $this->confirming = false;

        $this->validate();

        try {
            $data = [
                'name' => strtoupper($this->name),
                'description' => $this->description
            ];

            if ($this->macroprocess_id) {
                $data['macroprocess_id'] = $this->macroprocess_id;
            }

            if ($this->selectedIcon) {
                $data['icon'] = $this->selectedIcon;
            }

            macro_processes::create($data);

            $this->clear();
            $this->emit('render');

            session()->flash('message', 'El registro has sido guardado de forma exitosa');
        } catch (\Exception $e) {
            // $this->addError('name', 'Ocurrió un error al guardar el registro.');
            $this->confirming = false;
        }
    }

    public function clear()
    {
        $this->reset('name', 'macroprocess_id', 'description', 'selectedIcon');
    }

    public function render()
    {

        return view('livewire.macroprocess.macro-process-form');
    }
}
