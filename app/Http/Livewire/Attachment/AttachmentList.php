<?php

namespace App\Http\Livewire\Attachment;

use Livewire\Component;

class AttachmentList extends Component
{
    public $selectedItem;


    public function mount()
    {
        $this->selectedItem = $this->props('selectedItem');
    }

    public function render()
    {
        return view('livewire.attachment.attachment-list');
    }
}
