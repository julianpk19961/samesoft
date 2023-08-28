<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\areas;
use App\Models\macro_processes;
use App\Models\documents;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class Dashboard extends Component
{
    use WithFileUploads;

    public $MacroProcesses, $filters, $currentKeyArea, $selectedItem, $showModal = false, $showModalNewDocument = false;
    public $fileName, $fileDescription, $fileAttachment;

    protected $rules = [
        'fileName' => ['required', 'min:5'],
        'fileAttachment' => ['required', 'file', 'max:5120'],
    ];


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

    public function clear()
    {

        $this->fileName = '';
        $this->fileDescription = '';
        $this->fileAttachment = '';


        // if (isset($this->selectedItem)) {
        // }elseif
    }

    public function toggleAddNewDocument()
    {

        $this->showModal = !$this->showModal;
        $this->showModalNewDocument = !$this->showModalNewDocument;

        // if (isset($this->selectedItem)) {
        // }elseif
    }

    public function upploadFile()
    {

        $this->validate();

        $newFileName = $this->fileName . '.' . $this->fileAttachment->getClientOriginalExtension();
        $attachmentPath = 'public/img/attachments/' . $newFileName;

        $this->fileAttachment->storeAs('', $attachmentPath);

        $document = new Documents();
        $document->name = $this->fileName;
        $document->description = $this->fileDescription ? $this->fileDescription : null;
        $document->content = $attachmentPath;
        $document->versionNumber = $this->selectedItem->documents()->count() + 1;
        $document->user_id = auth()->user()->id;

        $this->selectedItem->documents()->save($document);
        $this->toggleAddNewDocument();
    }

    public function downloadFile($id)
    {
        $document = documents::findOrFail($id);
        $path = $document->content;
        return Storage::download($path);
    }

    public function render()
    {
        return view('livewire.index.dashboard');
    }
}
