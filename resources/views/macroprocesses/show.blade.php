<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Macroprocesos') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div>
            @livewire('macro-process-form') <!-- Cache the output for 1 hour and defer loading -->
        </div>
        <x-section-border />
        <div>
                @livewire('macro-process-list')
            </div>
            <x-section-border />
    </div>

    <script src="/path/to/livewire.js" defer></script> <!-- Defer loading of the Livewire JavaScript library -->
</x-app-layout>

