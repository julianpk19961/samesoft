@props(['macroProcesses'])

<div>

    <x-section-title>
        <x-slot name="title">{{ __('Macroprocesos Registrados') }}</x-slot>
        <x-slot name="description">
            {{ __('Listado de macroprocesos creados en el sistema: ') }}
        </x-slot>
    </x-section-title>

    @isset($macroProcesses)
        @foreach ($macroProcesses as $macroProcess)
            <li>{{ $macroProcess->name }}</li>
        @endforeach
    @endisset

</div>
