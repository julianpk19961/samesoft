<?php

namespace App\Http\Livewire;

use App\Models\documents;
use League\CommonMark\Node\Block\Document;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AttachmentFormCreate extends Component
{
    use WithFileUploads;

    protected $rules = [
        'fileName' => ['required', 'min:5'],
        'fileAttachment' => ['required', 'file', 'max:5120'],
    ];

    public $file, $fileName, $fileDescription, $fileAttachment;
    public $disk = 'documents';
    public $selectedItem;

    public function stored()
    {

        $this->validate();

        $file = $this->fileAttachment;
        $newFileName = Str::slug($this->fileName) . '.' . $file->getClientOriginalExtension();
        $currentVersion = Documents::where('name', '=', $newFileName)->count();
        // $path = $file->storeAs($this->disk, $newFileName);

        $document = new Documents();
        $document->name = $this->fileName;
        $document->description = $this->fileDescription ? $this->fileDescription : null;
        $document->content = $file->storeAs($this->disk, $newFileName);
        $document->versionNumber = $currentVersion + 1;
        $this->selectedItem->documents()->save($document);

        // $document->save();
        // dd($document);

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
