<div class="grid grid-cols-1 md:grid-cols-3">
    <div class="col-span-1 md:col-span-3 mb-1">
        <x-section-title>
            <x-slot name="title">{{ __('Macroprocesos Registrados') }}</x-slot>
            <x-slot name="description">{{ __('Listado de macroprocesos creados en el sistema') }}</x-slot>
        </x-section-title>
    </div>
    <div class="col-span-2 md:col-span-3 lg:col-span-3 bg-white rounded-tl-md rounded-tr-md shadow-sm p-1">
        <ul class="divide-y divide-gray-200 border custom-max-height overflow-y-auto">
            @foreach ($this->macroProcesses as $macroProcess)
            <li class="flex flex-col md:flex-row justify-between items-start md:items-center gap-2 p-2"
                wire:key="{{ $macroProcess->id }}">
                <div class="flex flex-col md:flex-row items-center justify-center w-2/5">
                    <div class="pt-5 flex flex-col items-center justify-center w-full md:w-1/2">

                        <div class="text-center">
                            <div class="w-10 h-10 flex items-center justify-center mx-auto" id="svgIcon"
                                title="{{ $macroProcess->description }}">
                                @isset($macroProcess->icon)
                                @php($icon = "svg.macroprocess.".$macroProcess->icon)
                                @else
                                @php($icon = "svg.standard.noneIcon")
                                @endisset
                                <x-dynamic-component :component="$icon" width="100%" height="100%"
                                    class="flex-shrink-0" />

                            </div>
                            <div id="svgStatus" title="{{ $macroProcess->active === '1'
                                ? " ACTIVO" : "INACTIVO" }}"
                                class="text-lg font-bold truncate whitespace-normal text-center w-full flex justify-content-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 {{ $macroProcess->active === '1'
                                 ? " text-green-500" : "text-red-500" }} "
                                    viewBox=" 0 0 20 20" fill="currentColor">
                                    <path fill-rule="nonzero"
                                        d="M0 10a10 10 0 1020 0A10 10 0 000 10zm10-9a9 9 0 100 18 9 9 0 000-18z"
                                        clip-rule="nonzero"></path>
                                </svg>
                                <span class="text-sm md:text-sm">{{ Str::upper($macroProcess->name)}} </span>
                            </div>
                        </div>
                        <div class="text-xs">
                            <p class="text-xs font-small mt-4">
                                <span class="text-align-left">{{ __("Creado: ".$macroProcess->created_at) }}</span>
                                <br>
                                <span class="text-align-left">{{ __("Modificado: ".$macroProcess->created_at) }}</span>
                            </p>
                        </div>
                        <div class="flex items-center justify-center gap-2 border-t-1 mt-2">

                            @livewire('macro-process-delete', ['macroProcess' => $macroProcess], key($macroProcess->id))

                            <x-button wire:click="showMacroProcessDetails({{ $macroProcess->id }})"
                                wire:loading.attr="disabled" class="bg-green-600 text-white" color="warning">
                                <i class="fa-solid fa-eye"></i>
                            </x-button>

                            <x-button wire:click="editMacroProcessDetails({{ $macroProcess->id }})" color="orange"
                                class="bg-orange-500 text-sm" title="Modificar Macroproceso"
                                id="add-{{ $macroProcess->id }}">
                                <i class="fa fa-solid fa-pen"></i>
                            </x-button>

                            <x-button wire:click="addMacroProcessDetails({{ $macroProcess->id }})" color="cyan"
                                class="bg-cyan-500 text-sm" title="Agregar Macroproceso"
                                id="add-{{ $macroProcess->id }}">
                                <i class="fa fa-solid fa-circle-plus"></i>
                            </x-button>


                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-3/5">
                    <div class="w-full">
                        <div class="flex justify-center">
                            <div class="border border-gray-300 rounded-lg">

                                <div class="flex" wire:key='{{ $macroProcess->name }}'>
                                    @foreach ($this->tabs as $tabTitle => $tabContent)
                                    <div class="px-4 py-2 cursor-pointer {{ isset($activeTabs[$macroProcess->id]) && $activeTabs[$macroProcess->id] === $tabTitle ? 'text-blue-500 bg-gray-200' : 'text-gray-500' }}"
                                        wire:click="setActiveTab('{{ $tabTitle }}','{{ $macroProcess->id }}')">
                                        {{ $tabTitle }}
                                    </div>
                                    @endforeach

                                    <div class="flex-grow"></div>
                                    <div class="px-4 py-2 cursor-pointer text-gray-500 bg-gray-200">
                                    </div>

                                </div>

                                <div class="p-2">
                                    <div class="overflow-x-auto rounded-lg">
                                        <table class="w-full bg-white border border-gray-300"
                                            style="table-layout: fixed;">
                                            <thead>
                                                <tr class="w-full">
                                                    <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800"
                                                        colspan="2" &nbsp;>
                                                        Nombre
                                                    </th>
                                                    <th
                                                        class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                                        Encargado
                                                    </th>
                                                    <th
                                                        class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                                        Descripción
                                                    </th>
                                                    <th
                                                        class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                                        opciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @if(isset($activeTabs[$macroProcess->id]))

                                                @if(count($collectionTabContent[$macroProcess->id])>0)

                                                @foreach ($collectionTabContent[$macroProcess->id] as $item)
                                                <tr>
                                                    <td wire:click="showMacroProcessDetails({{ $item['id'] }})"
                                                        class="py-2 px-4 border-b border-gray-150 whitespace-normal break-words"
                                                        colspan="2">&nbsp;
                                                        {{ $item['name'] }}
                                                    </td>
                                                    <td wire:click="showMacroProcessDetails({{ $item['id'] }})"
                                                        class="py-2 px-4 border-b border-gray-150">
                                                        test
                                                    </td>

                                                    <td wire:click="showMacroProcessDetails({{ $item['id'] }})"
                                                        class="py-2 px-4 border-b border-gray-150"
                                                        title="{{ $item['description'] }}">
                                                        {{ Str::limit(Str::lower($item['description']), 10, '...')
                                                        }}
                                                    </td>
                                                    <td class="text-center border-b">
                                                        <x-button wire:click="disableDelete({{ $item['id'] }})"
                                                            wire:loading.attr="disabled"
                                                            class="bg-red-600 flex-shrink-0"
                                                            title="Eliminar/Inactivar Registro">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </x-button>
                                                    </td>
                                                </tr>

                                                @endforeach
                                                @if (count($collectionTabContent[$macroProcess->id]) < 3)
                                                    @for($i=count($collectionTabContent[$macroProcess->id]);
                                                    $i <3 ;$i++) <tr w="full">
                                                        <td class="py-2 px-4 border-b border-gray-100 empty-cell whitespace-normal break-words text-xs text-center bg-gray-300"
                                                            colspan="5">&nbsp;
                                                            No se encontraron registros
                                                        </td>
                                                        </tr>
                                                        @endfor
                                                        @endif
                                                        @else
                                                        @for($i=0; $i <3 ;$i++) <tr w="full">
                                                            <td class="py-2 px-4 border-b border-gray-100 empty-cell whitespace-normal break-words text-xs text-center bg-gray-300"
                                                                colspan="5">&nbsp;
                                                                No se encontraron registros
                                                            </td>
                                                            </tr>
                                                            @endfor
                                                            @endif
                                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            @endforeach
        </ul>
        {{-- modal --}}


    </div>

    @if ($showModal === true || $showAddRecordsModal === true)

    <div
        class="flex w-full items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
        @if($showModal)

        <x-confirmation-modal wire:model.defer="showModal" class="bg-slate-100">
            <x-slot name="title">
                {{ $selectedMacroProcess->name }}
            </x-slot>

            <x-slot name="content">
                <form wire:submit.prevent="{{ $disable === true ? null :'updateMacroProcess' }}" class=" bg-white sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md'
                    : 'sm:rounded-tr-md' }}">

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="updateName" type="text"
                            class="{{ $disable !== True ?:'bg-gray-300'  }} mb-2 block w-full" autocomplete="name"
                            :disabled="$disable" wire:model.defer="{{ $disable === true ? 'showName':'updateName' }}" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">

                        <div class="flex gap-2">
                            <div class="flex-col w-1/2">
                                <x-label for="macroprocess_id" value="{{ __('Asignado') }}" />

                                <x-input id="macroprocess_id" type="text"
                                    class="{{ $disable !== True ?:'bg-gray-300'  }} mb-2 block w-full"
                                    autocomplete="name" :disabled="$disable"
                                    wire:model.defer="{{ $disable === true ? 'showParent':'updateParent' }}" />
                                <x-input-error for="macroprocess_id" class="mt-2" />
                            </div>

                            <div class="flex-col w-1/2">
                                <x-label for="icon" value="{{ __('Icono') }}" />

                                @if ($disable === true)
                                <x-input id="macroprocess_id" type="text" class="bg-gray-300 mb-2 block w-full"
                                    autocomplete="name" :disabled="$disable" value="{{ $showIcon }}" />
                                @else

                                <x-input-selection id="macroprocess_id" name="macroprocess_id" class="mb-2 block w-full"
                                    wire:model.defer="updateIcon">

                                    @foreach ($svgIcons as $icon)
                                    <option value="{{ $icon }}" class="flex items-center">
                                        {{ strtoupper($icon) }}
                                    </option>
                                    @endforeach

                                </x-input-selection>

                                @endif
                                <x-input-error for="icon" class="mt-2" />

                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="description" value="{{ __('Descripción') }}" />
                        <textarea name="description" id="description" rows="3"
                            class="{{ $disable !== True ?:'bg-gray-300'  }} w-full mt-1 block border-gray-300 rounded-md shadow-sm"
                            @readonly($disable)
                            wire:model.defer="{{ $disable === true ? 'showDescription':'updateDescription' }}" />{{
                        $selectedMacroProcess->description }}</textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success text-green-400 bg-white w-full text-end px-1 py-1">
                            {{ session('message') }}
                            <svg class="inline-flex mr-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        @endif
                    </div>

                    <div class="flex flex-row justify-end px-6 py-4 text-right">
                        <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled" id="closeModal">
                            {{ __('Cerrar') }}
                        </x-secondary-button>

                        @if ($disable === false )
                        <x-button class="ml-2" wire:loading.attr="disabled" color="green">
                            {{ __('Guardar') }}
                        </x-button>
                        @endif
                    </div>

                </form>
            </x-slot>

            <x-slot name="footer">


            </x-slot>
        </x-confirmation-modal>
        @endif
        @if($showAddRecordsModal)
        <x-confirmation-modal wire:model="showAddRecordsModal" class="w-100">
            <x-slot name="title">
                {{ __('Asignación de macroproceso') }}
            </x-slot>

            <x-slot name="content">
                <div class="modal-content py-4 text-left px-6">
                    @if($showAddRecordsModal && $macroProcessList && count($macroProcessList) > 0)
                    @foreach($macroProcessList as $index => $item)
                    <div class="flex items-center">
                        <span class="flex-grow @if($index %2 == 0) text-black-800 @else text-gray-800 @endif m-2">{{
                            Str::upper($item->name) }}</span>
                        <input type="checkbox" class="form-checkbox text-blue-500 h-4 w-4 mr-2"
                            wire:model="macroProcessCheckedList" value="{{ $item->id }}">

                    </div>
                    <hr class="border-t border-gray-300 m-1 w-full">
                    @endforeach
                    @else
                    <p class="text-gray-500">No hay elementos disponibles para ser asignados.</p>
                    @endif
                </div>
                <p>{{ count($macroProcessCheckedList) }} elementos seleccionados.</p>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click.prevent="toggleAddRecordsModal" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-secondary-button>

                @if ($macroProcessList && count($macroProcessList)>0)
                <x-button class="ml-2" wire:click="AddRecordsMacroprocess" wire:loading.attr="disabled" color="green">
                    {{ __('Guardar') }}
                </x-button>
                @endif

            </x-slot>
        </x-confirmation-modal>
        @endif

    </div>
    @endif

    <style>
        .custom-max-height {
            max-height: 600px;
            /* Establece la altura máxima deseada */
        }
    </style>
</div>