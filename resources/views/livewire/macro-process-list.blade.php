<div class="grid grid-cols-1 md:grid-cols-3">
    <div class="col-span-1 md:col-span-3 mb-1">
        <x-section-title>
            <x-slot name="title">{{ __('Macroprocesos Registrados') }}</x-slot>
            <x-slot name="description">{{ __('Listado de macroprocesos creados en el sistema') }}</x-slot>
        </x-section-title>
    </div>

    <div class="col-span-2 md:col-span-3 lg:col-span-3 bg-white rounded-tl-md rounded-tr-md shadow-sm p-1">
        <ul class="divide-y divide-gray-200 border">
            @foreach ($macroProcesses as $macroProcess)
                <li class="flex flex-col md:flex-row justify-between items-start md:items-center gap-2 p-2">
                    <div class="flex flex-col md:flex-row items-center justify-center w-2/5">
                        <div class="flex flex-col items-center justify-center w-full md:w-1/2">
                            <div class="w-10 h-10 flex items-center justify-center">
                                @php
                                    $icon = "svg.macroprocess.$macroProcess->icon";
                                @endphp
                                <x-dynamic-component :component="$icon" width="100%" height="100%"
                                    class="flex-shrink-0" />
                            </div>
                            <div class="text-sm font-bold truncate whitespace-normal text-center w-full">
                                <span
                                    class="text-xs md:text-sm">{{ $macroProcess->name . ' ' . $macroProcess->childs }}</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 border-t-1 mt-2">
                                <x-button class="bg-red-500 hover:bg-red-700 text-sm"
                                    x-on:click="$dispatch('open-delete-modal', {{ $macroProcess->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </x-button>
                                <x-button class="bg-green-600 text-sm" title="Visualizar registro">
                                    <i class="fa-solid fa-eye"></i>
                                </x-button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col w-3/5">
                        <div class="w-full max-w-lg">
                            @livewire('macro-processes-childs', ['items' => $macroProcess->children])
                        </div>
                        
                    </div>
                </li>
            @endforeach

        </ul>

        <x-confirmation-modal wire:model="deleteConfirm">
            <x-slot name="title">{{ __('Eliminar elemento') }}</x-slot>
            <x-slot name="content">{{ __('¿Está seguro de que desea eliminar este elemento?') }}</x-slot>
            <x-slot name="footer">
                <x-secondary-button x-on:click="$dispatch('close-delete-modal')">{{ __('Cancelar') }}
                </x-secondary-button>
                <x-danger-button class="ml-2" x-on:click="eliminarElemento()">{{ __('Eliminar') }}</x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    </div>
</div>
