<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Macroprocesos') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @livewire('macro-process-form')
            <x-section-border />

            @livewire('macro-process-list')
            <x-section-border />


        </div>
    </div>
</x-app-layout>
