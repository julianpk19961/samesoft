<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="min-h-screen bg-white overflow-hidden shadow-xl sm:rounded-lg object-cover">
            <div class="grid grid-cols-2 min-h-screen bg-gradient-to-r from-cyan-500 to-blue-500 rounded m-5 p-2')]">

                <div class="grid-col justify-center space-y-1 my-auto p-1">
                    @foreach ($MacroProcesses as $macroProcess)
                    <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg text-center"
                        id="macroProcessInformation-{{ $macroProcess->name }}">
                        <p class="text-slate-500">{{ $macroProcess->name }}</p>

                        <div class="mt-1 flex items-center justify-items-stretch">
                            @php( $icon = "svg.macroprocess.$macroProcess->icon" )
                            <x-dynamic-component :component="$icon" width="20%" height="20%"
                                title="{{ $macroProcess->name }}" id="iconDiv-{{ $macroProcess->name }}">
                            </x-dynamic-component>

                            <div class="mt-3 grid grid-cols-6 m-2 w-full font-light "
                                id="areasDiv-{{ $macroProcess->name }}">
                                @foreach ($macroProcess->areas as $area)

                                <x-button
                                    class="ml-1 bg-gray-600 text-white text-center rounded-full h-full align-middle"
                                    wire:click="showDocumentsAreas({{ $area->id }})" wire:loading.attr="disabled"
                                    title="{{ $area->name }}">
                                    {{Str::limit(
                                    $area->name , 1, '')
                                    }}
                                </x-button>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="grid-col justify-center space-y-1 my-auto">
                    <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-y-0 m-1">
                        <div class="shrink-0">
                            <x-bubble>
                            </x-bubble>
                        </div>
                        <div>
                            <div class="text-sm font-light text-gray-800">Necesidades & espectativas</div>
                            <p class="text-slate-500">You have a new message!</p>
                        </div>
                    </div>
                    <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-y-0 m-1">
                        <div class="shrink-0">
                            <x-bubble> </x-bubble>
                        </div>
                        <div>
                            <div class="text-xl font-medium text-black">Satisfacción</div>
                            <p class="text-slate-500">You have a new message!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div>
        @if($showModal)

        <x-confirmation-modal wire:model="showModal" class="bg-slate-100 text-xl font-semibold text-gray-700">
            <x-slot name="title" class="">
                <!-- Tu modal HTML aquí -->
                <h3>
                    {{ Str::upper($selectedItem->name) }}
                    <button class="rounded-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 "
                        wire:click="toggleAddNewDocument">
                        <i class="fa fa-plus" title="Agregar archivo"></i>
                    </button>
                </h3>

            </x-slot>

            <x-slot name="content">
                <div
                    class="px-4 bg-gray-400 sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }}  mx-auto">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Nombre
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Archivo
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">

                                                @foreach ($selectedItem->documents as $document)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {{ Str::upper($document['name']) }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center"
                                                        title="type: {{ $document->extension }}">
                                                        <i
                                                            class="{{ $document->extension = 'pdf' ? 'fa fa-file-pdf-o' :  'fa fa-file-excel-o'}}"></i>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                                        <div class="flex space-x-2">
                                                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                                href="{{ route('attachment-show',['id'=>$document['id']]) }}"
                                                                title="{{ $document['name'] }}">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>

                                                            <button
                                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                                <i class="fa fa-upload"></i>

                                                            </button>
                                                            <button
                                                                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
                                                                wire:click="downloadFile({{ $document['id'] }})">
                                                                <i class="fa fa-download"></i>
                                                            </button>
                                                            <button
                                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                                wire:click="deleteFile({{ $document['id'] }})">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @if ($selectedItem->documents()->count() < 3) @for ($i=0; $i < 3 -
                                                    $selectedItem->documents()->count(); $i++)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            SIN ARCHIVO
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                                            <!-- Coloca aquí el contenido de las celdas de la fila -->
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                                            <div class="flex space-x-2">
                                                                <button
                                                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                                                    <i class="fa-solid fa-eye"></i>

                                                                </button>
                                                                <button
                                                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                                                    <i class="fa fa-upload"></i>

                                                                </button>
                                                                <button
                                                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                                                    <i class="fa fa-download"></i>
                                                                </button>
                                                                <button
                                                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                    @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="closeDocumentsModal">
                    {{ __('Cerrar') }}
                </x-secondary-button>
            </x-slot>
        </x-confirmation-modal>

        @endif

        @if($showModalNewDocument)

        <x-confirmation-modal wire:model="showModalNewDocument"
            class="bg-slate-100 text-xl font-semibold text-gray-700">
            <x-slot name="title" class="">
                <!-- Tu modal HTML aquí -->
                <h3>
                    {{ __('NUEVO DOCUMENTO') }}
                </h3>

            </x-slot>

            <x-slot name="content">
                <div
                    class="px-4 bg-gray-400 sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }}  mx-auto">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <form wire:submit.prevent="" class="w-full py-5" enctype="multipart/form-data">
                            <div class=" px-4 bg-white sm:p-6 shadow {{ !isset($create)
                            ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }} ">

                                <div class=" col-span-12 sm:col-span-10">
                                    <x-label for="fileName" value="{{ __('Name') }}" />
                                    <x-input id="fileName" type="text" class="mb-2 block w-full" wire:model="fileName"
                                        autocomplete="fileName" />
                                    <x-input-error for="fileName" class="mt-2" />
                                </div>

                                <div class="col-span-12 sm:col-span-10">
                                    <x-label for="fileDescription" value="{{ __('Descripción') }}" />
                                    <textarea name="fileDescription" id="fileDescription" rows="3"
                                        class="w-full mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        wire:model="fileDescription"></textarea>
                                    <x-input-error for="fileDescription" class="mt-2" />
                                </div>

                                <div class="col-span-12 sm:col-span-10">
                                    <x-label for="fileAttachment" value="{{ __('Adjuntar Archivo') }}" />
                                    <input type="file" name="fileAttachment" id="fileAttachment"
                                        accept=".pdf,.doc,.docx,.xls,.xlsx" wire:model="fileAttachment" wire:ignore>
                                    <x-input-error for="fileAttachment" class="mt-2" />
                                </div>

                                <div>
                                    @if (session()->has('message'))
                                    <div class="alert alert-success text-green-400 bg-white w-full text-end px-1 py-1">
                                        {{ session('message') }}
                                        <svg class="inline-flex mr-2 h-5 w-5 text-green-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                                <x-secondary-button wire:click="clear" wire:loading.attr="disabled" class="m-1">
                                    {{ __('Limpiar') }}
                                </x-secondary-button>

                                <x-button wire:click="upploadFile" wire:loading.attr="disabled">
                                    {{ __('Guardar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="closeDocumentsModal">
                    {{ __('Cerrar') }}
                </x-secondary-button>
            </x-slot>
        </x-confirmation-modal>

        @endif


        {{-- @if($showModalAttatchment)
        <x-confirmation-modal wire:model="showModalAttatchment"
            class="bg-slate-100 text-xl font-semibold text-gray-700">
            <x-slot name="title" class="">
                <!-- Tu modal HTML aquí -->
                <h3>
                    {{ __('VER DOCUMENTO') }}
                </h3>

            </x-slot>

            <x-slot name="content">
                <div
                    class="px-4 bg-gray-400 sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }}  mx-auto">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @livewire('attachment-viewer')
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="closeDocumentsModal">
                    {{ __('Cerrar') }}
                </x-secondary-button>
            </x-slot>
        </x-confirmation-modal>
        @endif --}}


    </div>

</div>