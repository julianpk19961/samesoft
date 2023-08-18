<?php

namespace App\Http\Livewire;

use App\Models\macro_processes;
use Livewire\Component;
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
        'name' => ['required', 'unique:macro_processes', 'min:5'],
    ];

    public function getMacroProcessesProperty()
    {
        return macro_processes::all();
    }

    public function getSvgIconsProperty()
    {

        $iconDirectory = resource_path('views/components/svg/macroprocess');

        if (File::exists($iconDirectory)) {
            $svgIcons = collect(File::files($iconDirectory))
                ->map(function ($file) {
                    return str_replace('.blade.php', '', $file->getFilename());
                });
            return $svgIcons;
        }

        return collect();
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
            $this->emit('updateList');

            session()->flash('message', 'El registro has sido guardado de forma exitosa');
        } catch (\Exception $e) {
            // $this->addError('name', 'Ocurrió un error al guardar el registro.');
            $this->confirming = false;
        }
    }

    public function clear()
    {
        $this->name = '';
        $this->macroprocess_id = '';
        $this->description = '';
        $this->selectedIcon = '';
    }

    public function render()
    {

        return view('livewire.macro-process-form');
    }
}
