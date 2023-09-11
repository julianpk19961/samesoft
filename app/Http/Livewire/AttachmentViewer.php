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
    public $disk = 'documents';
    public $files, $path;

    // Documents $attachmentId
    public function mount(documents $document)
    {
        $this->filePath = $document->content;
        $this->fileName = pathinfo($document->content, PATHINFO_FILENAME);
        $this->fileExtension = pathinfo($document->content, PATHINFO_EXTENSION);
        $this->fileFullName  = $this->fileName . '.' . $this->fileExtension;
        $this->fileUrl = Storage::disk($this->disk)->url('documents/test-de-envio.pdf');
        $this->fileExist = Storage::exists($this->disk . "/" . $this->fileFullName);

        $this->file = Storage::disk($this->disk)->get($this->fileFullName);
        // $this->fileUrl = $this->file->url();


        // $this->file = Storage::disk($this->disk)->url($this->fileFullName);
        // Obtener el archivo del disco

        // $archivo = Storage::disk('documents')->get($rutaArchivo);

        // $this->attachmentName = Str::slug($document->name) . $document->content->getClientOriginalExtension();

        $this->attachment = $this->fileUrl;
    }

    public function downloadFile()
    {
        return Storage::download($this->attachmentId->content);
    }

    public function render()
    {

        return view('livewire.attachments.attachment-viewer');
    }
}

// resources\views\attachments

      // log::info($record);
        // dd(['MODEL' => $record->documentable_type]);
        // return false;
        // $record->documentable_type;



        
        // $this->file = Storage::get($record->content);

        // return response()->stream($this->file->stream());
        // return response()->stream($this->file->stream());
        // $this->fileUrl = $record->content;
        // $this->fileUrlPublic = Storage::disk('public')->url($this->fileUrl);
        // $this->publicUrl = asset('storage/' . $this->fileUrl);