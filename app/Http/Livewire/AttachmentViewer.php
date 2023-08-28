<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AttachmentViewer extends Component
{

    public $fileUrl = '';
    // protected $listener = ['showAttachment'];
    protected $listeners = ['showAttachment' => 'showAttachment'];


    public function showAttachment($attachmentId)
    {
        $this->fileUrl = $attachmentId; // Aquí puedes usar $attachmentId para realizar las operaciones que necesites
    }

    public function render()
    {
        return view('livewire.attachments.attachment-viewer');
    }
}
// resources\views\attachments