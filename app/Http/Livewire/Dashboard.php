<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\areas;
use App\Models\macro_processes;
use App\Models\documents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

class Dashboard extends Component
{
    use WithFileUploads;

    public $MacroProcesses, $filters, $currentKeyArea, $selectedItem, $showModal = false, $showModalNewDocument = false, $showModalAttatchment = false;



    protected $messages = ['file attachment' => 'Adjunto'];

    public function getMacroProcessesProperty()
    {
        $query = macro_processes::all();
        return $query;
    }

    public function showDocumentsMacroProcess(macro_processes $macroProcesses)
    {
        $showModal = true;
    }

    // areas $area
    public function showDocumentsAreas(areas $area)
    {
        $this->selectedItem = $area;
        $this->showModal = !$this->showModal;
    }


    public function closeDocumentsModal()
    {

        $this->showModal = !$this->showModal;

        // if (isset($this->selectedItem)) {
        // }elseif
    }



    public function toggleAddNewDocument()
    {

        $this->showModal = !$this->showModal;
        $this->showModalNewDocument = !$this->showModalNewDocument;
        $this->showModalAttatchment = !$this->showModalAttatchment;
    }


    public function downloadFile(documents $document)
    {

        // $document = documents::findOrFail($id);
        // if ($document->contet) {
        $path = $document->content;
        return Storage::download($path);
        // }
        // return response('', 404);
    }


    public function showFile($record)
    {
        $this->showModal = false;
        $this->showModalNewDocument = false;
        $this->showModalAttatchment = true;
    }


    public function deleteFile(documents $document)
    {
        // dd($document);
        $document->delete();
    }

    public function mount()
    {
        $this->MacroProcesses = $this->getMacroProcessesProperty();
    }

    public function render()
    {
        return view('livewire.index.dashboard');
    }
}
