<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Areas') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div>
            @livewire('areas-form')
        </div>
        <x-section-border />
        <div>
            {{-- @livewire('macro-process-list') --}}
            @livewire('areas-list')

        </div>
        <x-section-border />
    </div>
</x-app-layout>