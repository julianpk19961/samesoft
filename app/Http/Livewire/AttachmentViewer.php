<?php

namespace App\Http\Livewire;

use App\Models\documents;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class AttachmentViewer extends Component
{

    public $attachmentName;
    public $attachment;
    public $fileUrl;
    public $disk = 'public';
    public $files, $path;

    // Documents $attachmentId
    public function mount(documents $document)
    {
        $this->attachment = asset($document->content);
        // $this->attachmentName =  Storage::disk($this->disk)->getClientOriginalName($this->attachment);

        // $this->attachmentName = $document->getOriginalClientName();
        // dd($attachment);

        // $this->files = [];

        // foreach (Storage::disk($this->disk)->files('img/attachments') as $file) {
        //     $name = str_replace("$this->disk/", "", $file);
        //     $path = asset(Storage::url($name));
        //     $this->files[] = [
        //         "name" => $name,
        //         "path" => $path
        //     ];
        // }
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