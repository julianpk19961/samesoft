<div class="grid grid-cols-1 md:grid-cols-3">
    <div class="col-span-1 md:col-span-3 mb-1">
        <x-section-title>
            <x-slot name="title">{{ __('Areas Registradas') }}</x-slot>
            <x-slot name="description">{{ __('Listado de Areas creadas en el sistema') }}</x-slot>
        </x-section-title>
    </div>
    <div class="col-span-2 md:col-span-3 lg:col-span-3 bg-white rounded-tl-md rounded-tr-md shadow-sm p-1">
        <ul class="divide-y divide-gray-200 border custom-max-height overflow-y-auto">
            {{-- @dd($this->areas) --}}
            @foreach ($this->areas as $area)
            <li class="flex flex-col md:flex-row justify-between items-start md:items-center gap-2 p-2"
                wire:key="{{ $area->id }}">
                <div class="flex flex-col md:flex-row items-center justify-center w-2/5">
                    <div class="flex flex-col items-center justify-center w-full md:w-1/2">
                        <div class="text-sm font-bold truncate whitespace-normal text-center w-full">
                            <span class="text-xs md:text-sm">{{ Str::upper($area->name . ' ' . $area->childs)
                                }}</span>
                        </div>
                        <div class="flex items-center justify-center gap-2 border-t-1 mt-2">

                            <x-button wire:click="deleteArea({{ $area->id }})" wire:loading.attr="disabled"
                                title="Eliminar Área" class="bg-red-600 text-white">
                                <i class="fa-solid fa-trash"></i>
                            </x-button>
                            {{-- wire:click="showareaDetails({{ $area->id }}) --}}
                            <x-button wire:click="showAreasDetails({{ $area->id }})" wire:loading.attr="disabled"
                                class="bg-green-600 text-white">
                                <i class="fa-solid fa-eye"></i>
                            </x-button>

                            <x-button wire:click="addareaDetails({{ $area->id }})" class="bg-cyan-500 text-sm"
                                title="Agregar Macroproceso" id="add-{{ $area->id }}">
                                <i class="fa fa-solid fa-circle-plus"></i>
                            </x-button>

                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-3/5">
                    <div class="w-full max-w-lg">
                        <div class="flex justify-center">
                            <div class="border border-gray-300 rounded-lg">

                                <div class="flex">
                                    @foreach ($this->tabs as $tabTitle => $tabContent)
                                    <div class="px-4 py-2 cursor-pointer {{ $activeTab === $tabTitle ? 'text-blue-500 bg-gray-200' : 'text-gray-500' }}"
                                        wire:click="setActiveTab('{{ $tabTitle }}')">
                                        {{ $tabTitle }}
                                    </div>
                                    @endforeach

                                    <div class="flex-grow"></div>
                                    <div class="px-4 py-2 cursor-pointer text-gray-500 bg-gray-200">
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="p-2">
                                    @if ($activeTab)
                                    <div class="overflow-x-auto rounded-lg">
                                        <table class="w-full bg-white border border-gray-300"
                                            style="table-layout: fixed;">
                                            <thead>
                                                <tr>
                                                    <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800"
                                                        rowspan="2">
                                                        Nombre
                                                    </th>

                                                    <th
                                                        class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                                        Descripción
                                                    </th>
                                                    <th
                                                        class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800 text-center">
                                                        opciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="border">
                                                @if (!$area->parents)
                                                @for ($i = 0; $i < 2; $i++) <tr>

                                                    <td class="py-2 px-4 border-b border-gray-100 empty-cell whitespace-normal break-words text-xs text-center bg-gray-300"
                                                        colspan="4">&nbsp;
                                                        No se encontraron registros
                                                    </td>

                                                    </tr>
                                                    @endfor
                                                    @else
                                                    <tr class="text-xs">
                                                        <td class="py-2 px-4 border-b border-gray-150 whitespace-normal break-words"
                                                            style="width: {{ $maxNameLength }}rem;"
                                                            title="{{ $area->parents->name }}@isset($area->parents->description): {{ $area->parents->description }}@endisset">
                                                            {{ Str::upper($area->parents->name )
                                                            }}
                                                        </td>

                                                        <td class="py-2 px-4 border-b border-gray-150">
                                                            {{ Str::limit(Str::lower($area->parents->description), 10,
                                                            '...') }}
                                                        </td>
                                                        <td class="py-2 px-4 border-b border-gray-150 text-center">

                                                            {{-- <x-button
                                                                wire:click="disableDelete({{ $area->parents->id }})"
                                                                wire:loading.attr="disabled"
                                                                class="bg-red-600 flex-shrink-0"
                                                                title="Eliminar/Inactivar Registro">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </x-button> --}}

                                                            <x-button
                                                                wire:click="disableDelete({{ $area->parents->id }})"
                                                                wire:loading.attr="disabled"
                                                                class="bg-green-600 flex-shrink-0"
                                                                title="Eliminar/Inactivar Registro">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </x-button>

                                                        </td>
                                                    </tr>
                                                    @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            @endforeach
        </ul>
        {{-- modal --}}
        <div
            class="flex items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

            <x-confirmation-modal wire:model="showModal" class="bg-slate-100">
                <x-slot name="title">
                    {{ $selectedAreasName }}
                </x-slot>

                <x-slot name="content">
                    <div
                        class="px-4 bg-white sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }}  mx-auto">

                        <div class="col-span-12 sm:col-span-10">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" type="text" class="mb-2 block w-full" autocomplete="name"
                                value="{{ $selectedAreasName  }}" :disabled="True" />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-12 sm:col-span-10">

                            {{-- Areas --}}
                            <x-label for="area_id" value="{{ __('Asignado') }}" />

                            <x-input id="area_id" type="text" class="mb-2 block w-full" autocomplete="name"
                                value="{{ $selectedAreasParent }}" :disabled="True" />
                            <x-input-error for="area_id" class="mt-2" />
                        </div>

                        <div class="col-span-12 sm:col-span-10">
                            <x-label for="description" value="{{ __('Descripción') }}" />
                            <textarea name="description" id="description" rows="3"
                                title="descripción: {{ $selectedAreasDescription }}"
                                class="w-full mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                readonly> {{ $selectedAreasDescription }}</textarea>
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
                    </div>


                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click="toggleModal" wire:loading.attr="disabled">
                        {{ __('Cerrar') }}
                    </x-secondary-button>

                    {{-- <x-button class="ml-2" wire:click="submit" wire:loading.attr="disabled" color="green">
                        {{ __('Guardar') }}
                    </x-button> --}}
                </x-slot>
            </x-confirmation-modal>

            <x-confirmation-modal wire:model="showAddRecordsModal" class="w-100">
                <x-slot name="title">
                    {{ __('Asignación de macroproceso') }}
                </x-slot>

                <x-slot name="content">
                    <div class="modal-content py-4 text-left px-6">
                        @if($showAddRecordsModal && $areaList && count($areaList) > 0)
                        @foreach($areaList as $index => $item)
                        <div class="flex items-center">
                            <span class="flex-grow @if($index %2 == 0) text-black-800 @else text-gray-800 @endif m-2">{{
                                $item->name }}</span>
                            <input type="checkbox" class="form-checkbox text-blue-500 h-4 w-4 mr-2"
                                wire:model="areaCheckedList" value="{{ $item->id }}">

                        </div>
                        <hr class="border-t border-gray-300 m-1 w-full">
                        @endforeach
                        @else
                        <p class="text-gray-500">No hay elementos disponibles.</p>
                        @endif
                    </div>
                    <p>{{ count($areasCheckedList) }} elementos seleccionados.</p>

                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button wire:click.prevent="toggleAddRecordsModal" wire:loading.attr="disabled">
                        {{ __('Cerrar') }}
                    </x-secondary-button>

                    <x-button class="ml-2" wire:click="AddRecordsarea" wire:loading.attr="disabled" color="green">
                        {{ __('Guardar') }}
                    </x-button>
                </x-slot>
            </x-confirmation-modal>
        </div>
    </div>

    <style>
        .custom-max-height {
            max-height: 600px;
            /* Establece la altura máxima deseada */
        }
    </style>
</div>