<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-center">
            {{ __('BIENVENIDO DE NUEVO - '. Str::upper(Auth::user()->name) ) }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div>
            @livewire('dashboard')
        </div>
        <x-section-border />
    </div>


</x-app-layout>