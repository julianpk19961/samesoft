<div>
    {{ $attachmentId->content }}

    <br>
    {{ "URl: ". (Storage::url($attachmentId->content)) . " Exists: " . (Storage::exists($attachmentId->content) ? '1' :
    '0') }}
    <br>
    <br>
    {{ asset($attachmentId['content']) }}
    <br>
    {{ Storage::url($attachmentId->content .'-')}}
    <iframe src="{{ Storage::url($attachmentId->content) }}" width="100%" height="500"></iframe>

    <x-section-border />

    <iframe src="{{ $fileUrl }}" width="100%" height="500"></iframe>

    <button class="bg-orange-500 py-2 px-4 rounded" wire:click="downloadFile()">
        Descargar Archivo
    </button>
</div>