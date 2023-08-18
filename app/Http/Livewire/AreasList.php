<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\areas;
use App\Models\macro_processes;

class AreasList extends Component
{
    public $areas, $activeTab, $tabs, $items, $maxNameLength,
        $selectedAreas, $selectedAreasId, $selectedAreasName,
        $selectedAreasParent, $selectedAreasDescription,
        $areasList, $currentAreas;

    public $showModal = false;
    public $showAddRecordsModal = false;
    public $areasCheckedList = [];



    protected $listeners = ['updateList' => '$refresh'];

    public function mount()
    {
        $this->showModal = false;

        $this->tabs = [
            'Macroproceso' => 'Macroprocesos Asignados',
            'Politicas' => 'Contenido de la Pestaña 3'
        ];

        $this->activeTab = 'Macroprocesos';
        $this->getAreasProperty();
        // $this->resetActiveTabs();
    }

    public function showAreasDetails(areas $selectedAreas)
    {
        $this->selectedAreasId = $selectedAreas->id;
        $this->selectedAreasName = $selectedAreas->name;
        $this->selectedAreasParent = !$selectedAreas->macro_process_id ? '' : macro_processes::findOrFail($selectedAreas->macro_process_id)->name;
        $this->selectedAreasDescription = $selectedAreas->description ? $selectedAreas->description : '';
        $this->showModal = true;
        // $this->render();
    }



    public function resetActiveTabs()
    {
        $this->activeTab = [];

        foreach ($this->areas as $area) {
            $this->activeTab[$area->id] = 'Areas';
        }
    }

    public function deleteArea(areas $areas)
    {
        $areas->delete();
        $this->emit('updateList');
    }

    public function disableDelete(areas $areas)
    {
        $areas->areas_id = null;
        $areas->save();
        $this->emit('updateList');
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
        $this->selectedAreasId = '';
        $this->selectedAreasName = '';
        $this->selectedAreasParent = '';
        $this->selectedAreasDescription = '';
    }

    public function addareasDetails(areas $selectedareas)
    {
        $this->currentAreas = $selectedareas;

        $this->areasList = areas::whereNull('areas_id')
            ->where('id', '!=', $selectedareas->id)
            ->when($selectedareas->areas_id, function ($query, $Fk) {
                return $query->where('id', '!=', $Fk);
            })
            ->get();

        $this->showAddRecordsModal = true;
    }

    public function toggleAddRecordsModal()
    {
        $this->showAddRecordsModal = !$this->showAddRecordsModal;
        $this->areasList = '';
    }


    public function AddRecordsareas()
    {
        $selectedItems = $this->areasCheckedList;

        foreach ($selectedItems as $item) {
            $currentRecord = areas::findOrFail($item);
            $currentRecord->areas_id = $this->currentareas->id;
            $currentRecord->save();
        }

        $this->currentAreas = null; // Cambia '' a null
        $this->toggleAddRecordsModal();
        $this->emit('updateList');
    }



    public function getAreasProperty($filters = [])
    {
        // $query = areas::with('macroProcess')->get();
        $query = areas::all();

        if (!empty($filters)) {
            foreach ($filters as $column => $value) {
                $query->where($column, $value);
            }
        }
        return $query;
    }


    public function setActiveTab($areasId, $index)
    {
        $this->activeTab[$areasId] = $index;
    }


    public function render()
    {
        $this->areas = $this->getAreasProperty();
        return view('livewire.areas.areas-list');
    }
}
