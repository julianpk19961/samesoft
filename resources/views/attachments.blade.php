<x-app-layout>


    {{-- <h1>Ver Archivo {{ request()->id }}</h1> --}}

    <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div>
            @livewire('attachment-viewer', ['document'=> request()->id])
        </div>

    </div>
    <x-section-border />

    <h1>FIN</h1>

</x-app-layout>