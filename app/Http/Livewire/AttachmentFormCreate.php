<?php

namespace App\Http\Livewire;

use App\Models\documents;
use Livewire\Component;
use Livewire\WithFileUploads;

class AttachmentFormCreate extends Component
{
    use WithFileUploads;

    protected $rules = [
        'fileName' => ['required', 'min:5'],
        'fileAttachment' => ['required', 'file', 'max:5120'],
    ];

    public $file, $fileName, $fileDescription, $fileAttachment;
    public $disk = 'public';
    public $selectedItem;

    public function stored()
    {

        $this->validate();

        $file = $this->fileAttachment;
        $fileAttachment = file_get_contents($file->getRealPath());
        $filename = $file->getClientOriginalName();
        $fileZise = $file->getSize();
        $newFileName = $this->fileName . '.' . $file->getClientOriginalExtension();


        $document = new Documents();
        $document->name = $this->fileName;
        $document->description = $this->fileDescription ? $this->fileDescription : null;
        $document->content = $file->storeAs('', $newFileName, $this->disk);
        $document->versionNumber = $this->id + 1;

        $this->selectedItem->documents()->save($document);
        // $this->toggleAddNewDocument();
    }

    public function clear()
    {
        $this->fileName = '';
        $this->fileDescription = '';
        $this->fileAttachment = '';
    }

    public function mount($selectedItem)
    {
        $this->selectedItem = $selectedItem;
    }

    public function render()
    {
        return view('livewire.attachments.attachment-form-create');
    }
}
