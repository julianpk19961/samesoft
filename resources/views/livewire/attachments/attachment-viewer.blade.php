<div>
    <br>
    Ruta almacenada: {{ $filePath}}
    <br>
    Nombre Archivo: {{ $fileName}}
    <br>
    Extensión: {{ $fileExtension}}
    <br>
    Nombre Completo Archivo: {{ $fileFullName}}
    <br>
    URL Archivo: {{ $file}}

    <iframe src="{{ $fileUrl }}" width="100%" height="500px"></iframe>';

    {{-- @foreach ($files as $file)
    Name: {{ $file["name"] }}
    <br>
    Path: {{ $file["path"] }}
    <br>
    <br> --}}

    {{-- @endforeach --}}



    {{-- attachment: {{ url('storage/img/attachments/PRUEBA420_4sep23.pdf') }} --}}
    {{-- <br> --}}
    {{-- attachmentId: {{ $attachmentId->content }} --}}
    {{-- <br>
    fileUrl: {{ $fileUrl }}
    <br>
    attachment : {{ Storage::disk('public')->exists($fileUrl) }}
    <br>
    <iframe src="http://127.0.0.1:8000/img/attachments/PRUEBA420_4sep23.pdf" width="100%" height="500"></iframe>

    <x-section-border />

    <iframe src="data:application/pdf;base64,{{ base64_encode($attachment) }}" width="100%" height="500"></iframe>



    {{-- <iframe src="{{ $fileUrl }}" width="100%" height="500"></iframe> --}}

    {{--<button class="bg-orange-500 py-2 px-4 rounded" wire:click="downloadFile()">
        Descargar Archivo
    </button> --}}
</div>