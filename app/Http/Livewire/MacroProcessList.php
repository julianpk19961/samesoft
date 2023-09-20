<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\macro_processes;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;


class MacroProcessList extends Component
{
    public $MacroProcesses, $activeTab, $tabs, $items, $maxNameLength,
        $selectedMacroProcess, $selectedMacroProcessId, $selectedMacroProcessName,
        $selectedMacroProcessParent, $selectedMacroProcessIcon, $selectedMacroProcessDescription, $macroProcessList, $currentMacroprocess;

    public $showModal = false;
    public $showAddRecordsModal = false;
    public $macroProcessCheckedList = [];
    public $activeTabs = [];
    public $activeTabsContent = [];



    protected $listeners = ['updateList' => '$refresh'];

    public function mount()
    {
        $this->showModal = false;


        // $this->resetActiveTabs();

        $this->tabs = [
            'Macroprocesos' => 'children',
            'Areas' => 'parents',
            'Politicas' => 'documents',
        ];

        $this->activeTab = 'Macroprocesos';
        $this->getMacroProcessesProperty();
    }

    public function showMacroProcessDetails(macro_processes $selectedMacroProcess)
    {
        $this->selectedMacroProcessId = $selectedMacroProcess->id;
        $this->selectedMacroProcessName = $selectedMacroProcess->name;
        $this->selectedMacroProcessParent = !$selectedMacroProcess->macroprocess_id ? '' : macro_processes::findOrFail($selectedMacroProcess->macroprocess_id)->name;
        $this->selectedMacroProcessIcon = $selectedMacroProcess->icon;
        $this->selectedMacroProcessDescription = $selectedMacroProcess->description ? $selectedMacroProcess->description : '';
        $this->showModal = true;
        // $this->render();
    }



    public function resetActiveTabs($activeTab)
    {
        $this->activeTab = [];

        foreach ($this->macroProcesses as $macroProcess) {
            $this->activeTab[$macroProcess->id] = 'Macroprocesos';
        }
    }

    public function disableDelete(macro_processes $macroProcess)
    {
        $macroProcess->macroprocess_id = null;
        $macroProcess->save();
        $this->emit('updateList');
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
        $this->selectedMacroProcessId = '';
        $this->selectedMacroProcessName = '';
        $this->selectedMacroProcessParent = '';
        $this->selectedMacroProcessIcon = '';
        $this->selectedMacroProcessDescription = '';
    }

    public function addMacroProcessDetails(macro_processes $selectedMacroProcess)
    {
        $this->currentMacroprocess = $selectedMacroProcess;

        $this->macroProcessList = macro_processes::whereNull('macroprocess_id')
            ->where('id', '!=', $selectedMacroProcess->id)
            ->when($selectedMacroProcess->macroprocess_id, function ($query, $Fk) {
                return $query->where('id', '!=', $Fk);
            })
            ->get();

        $this->showAddRecordsModal = true;
    }

    public function toggleAddRecordsModal()
    {
        $this->showAddRecordsModal = !$this->showAddRecordsModal;
        $this->macroProcessList = '';
    }


    public function AddRecordsMacroprocess()
    {
        $selectedItems = $this->macroProcessCheckedList;

        foreach ($selectedItems as $item) {
            $currentRecord = macro_processes::findOrFail($item);
            $currentRecord->macroprocess_id = $this->currentMacroprocess->id;
            $currentRecord->save();
        }

        $this->currentMacroprocess = null; // Cambia '' a null
        $this->toggleAddRecordsModal();
        $this->emit('updateList');
    }



    public function getMacroProcessesProperty($filters = [])
    {
        $query = macro_processes::all();

        if (!empty($filters)) {
            foreach ($filters as $column => $value) {
                $query->where($column, $value);
            }
        }
        return $query;
    }


    public function setActiveTab($index, $currentMacroprocess)
    {

        if (!isset($this->activeTabs[$currentMacroprocess])) {
            $this->activeTabs[$currentMacroprocess] = [];
            $this->activeTabsContent[$currentMacroprocess] = [];
        }

        $macroProcessSeleceted = macro_processes::findOrFail($currentMacroprocess);
        // Actualiza el estado activo de la pestaña solo para el macroproceso actual.

        $this->activeTabs[$currentMacroprocess] = $index;
        $this->activeTabsContent[$currentMacroprocess] = $macroProcessSeleceted->{$this->tabs[$index]}();
        // $this->activetbsContent[$currentMacroprocess] = macro_processes::findOrFail($currentMacroprocess)->name;
    }



    public function render()
    {

        return view('livewire.macro-process-list');
    }
}
