<?php

namespace App\Http\Livewire;

use App\Models\documents;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AttachmentViewer extends Component
{

    public $attachmentId;
    public $fileUrl;

    public function mount(documents $attachmentId)
    {
        $this->attachmentId = $attachmentId;
        $this->fileUrl = $this->attachmentId->content;

        // $this->fileUrl = Storage::url($this->attachmentId->content);

        // if (!Storage::exists($this->attachmentId->content)) {
        //     return 'El archivo adjunto no existe.';
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