<?php

namespace App\Http\Livewire;

use App\Models\documents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class AttachmentViewer extends Component
{

    public $attachmentName;
    public $attachment;
    public $file, $fileUrl, $filePath, $fileExtension, $fileName, $fileFullName, $fileExist;
    // public $disk = 'public';
    public $files, $path;
    public $document;


    // Documents $attachmentId
    public function mount(documents $document)
    {
        $this->document = $document;
    }

    public function downloadFile()
    {
        return Storage::download($this->document->content);
    }

    public function render()
    {

        return view('livewire.attachments.attachment-viewer');
    }
}
