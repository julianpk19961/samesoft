<?php

namespace App\Http\Livewire;

use App\Models\documents;
use League\CommonMark\Node\Block\Document;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use function PHPUnit\Framework\once;

class AttachmentFormCreate extends Component
{
    use WithFileUploads;

    protected $rules = [
        'fileName' => ['required', 'min:5'],
        'fileAttachment.*' => ['required', 'file', 'max:5120'],
    ];

    public $file, $fileName, $fileDescription, $fileAttachment, $fileLinkStored;
    public $disk = 'public';
    public $selectedItem;

    public function stored()
    {

        $this->validate();
        $filename = trim($this->fileName);

        if ($this->fileAttachment) {
            $file = $this->fileAttachment;
            $newFileName = Str::slug($filename) . '.' . $file->getClientOriginalExtension();
            $currentVersion = Documents::where('name', '=', $newFileName)->count();
        } else {
            $currentVersion = Documents::where('name', '=', $filename)->count();
        }

        $document = new Documents();
        $document->name = $filename;
        $document->document_url = $this->fileLinkStored;
        $document->description = $this->fileDescription;
        $document->content = $this->fileAttachment ? $file->storeAs('documents/' . $newFileName) : null;
        $document->versionNumber = $currentVersion + 1;
        $this->selectedItem->documents()->save($document);
        $this->clear();
    }

    public function clear()
    {
        $this->reset();
    }

    public function mount($selectedItem)
    {
        @once();
        $this->selectedItem = $selectedItem;
    }

    public function render()
    {
        return view('livewire.attachments.attachment-form-create');
    }
}
