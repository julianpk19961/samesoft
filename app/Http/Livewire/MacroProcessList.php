<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\macro_processes;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class MacroProcessList extends Component
{
    public $MacroProcesses, $tabs, $macroProcessList, $currentMacroprocess;


    //SHOW DATA
    public $selectedMacroProcess = null;

    //MODIFYDATA
    public $updateName, $updateParent, $updateIcon, $updateDescription;

    public $defaultTab = 'Macroprocesos';
    public $showModal = false;
    public $disable = True;
    public $updateMacroProcess = False;
    public $showAddRecordsModal = false;
    public $macroProcessCheckedList = [];
    public $activeTabs;
    public $collectionTabContent;



    protected $listeners = ['updateList' => 'mount'];

    public function mount()
    {
        $this->showModal = false;

        $this->tabs = [
            'Macroprocesos' => 'children',
            'Areas' => 'areas',
            'Politicas' => 'politicas',
            'Documentos' => 'documentos',
        ];

        $macroProcesses = $this->getMacroProcessesProperty();
        $this->resetActiveTabs();
    }

    public function showMacroProcessDetails(macro_processes $selectedMacroProcess)
    {
        $this->selectedMacroProcess = $selectedMacroProcess;
        $this->disable = true;
        $this->showModal = true;
    }

    public function editMacroProcessDetails(macro_processes $selectedMacroProcess)
    {
        $this->selectedMacroProcess = $selectedMacroProcess;
        $this->disable = false;
        $this->showModal = true;
        $this->dispatchBrowserEvent('focus', ['selector', '#closeModal']);
    }


    public function updateMacroProcess()
    {
        dd($this->showModal);
        // dd($selectedMacroProcess);
    }

    public function resetActiveTabs()
    {
        foreach ($this->macroProcesses as $macroProcess) {
            $this->activeTabs[$macroProcess->id] = $this->defaultTab;
            $this->collectionTabContent[$macroProcess->id] = $macroProcess->children->count() > 0 ? $macroProcess->children :  collect([]);
        }
    }

    public function disableDelete(macro_processes $macroProcess)
    {
        $macroProcess->macroprocess_id = null;
        $macroProcess->save();
        // $this->emit('updateList');
        $this->mount();
    }

    public function closeModal()
    {
        unset($this->selectedMacroProcess);
        $this->showModal = !$this->showModal;
        $this->disable = True;
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
        $this->mount();
    }



    public function getMacroProcessesProperty($filters = [])
    {
        $query = macro_processes::all();
        return $query;
    }


    public function setActiveTab($index, macro_processes $currentMacroprocess)
    {

        if (!isset($this->activeTabs[$currentMacroprocess->id])) {
            $this->activeTabs[$currentMacroprocess->id] = [];
        }

        $this->activeTabs[$currentMacroprocess->id] = $index;

        if ($index == 'Macroprocesos') {
            $this->collectionTabContent[$currentMacroprocess->id] = $currentMacroprocess->children;
        } elseif ($index == 'Areas') {
            $this->collectionTabContent[$currentMacroprocess->id] = $currentMacroprocess->areas;
        } elseif ($index == "Politicas") {
            $this->collectionTabContent[$currentMacroprocess->id] = collect();
        } elseif ($index == 'Documentos') {
            $this->collectionTabContent[$currentMacroprocess->id] = $currentMacroprocess->documents;
        } else {
            $this->collectionTabContent[$currentMacroprocess->id] = collect();
        }
        $this->collectionTabContent[$currentMacroprocess->id] = $this->collectionTabContent[$currentMacroprocess->id] ?? collect();
    }

    public function render()
    {

        return view('livewire.macroprocess.macro-process-list');
    }
}
