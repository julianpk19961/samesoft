<?php

namespace App\Http\Livewire;

use App\Models\documents;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class AttachmentViewer extends Component
{

    public $fileUrl = '';
    public $fileUrlPublic = '';
    public $publicUrl = '';
    protected $listeners = ['showAttachment' => 'showAttachment'];

    public function showAttachment(documents $record)
    {
        // log::info($record);
        // dd(['MODEL' => $record->documentable_type]);
        // return false;
        // $record->documentable_type;

        $this->fileUrl = $record->content; // Aquí puedes usar $attachmentId para realizar las operaciones que necesites
        $this->fileUrlPublic = storage_path('app/public', $record->content);
        $this->publicUrl = asset('storage/' . $this->fileUrl);
    }

    public function render()
    {
        return view('livewire.attachments.attachment-viewer');
    }
}
// resources\views\attachments