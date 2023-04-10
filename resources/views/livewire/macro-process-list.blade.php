<div class="grid grid-cols-1 md:grid-cols-3">

    <x-section-title>
        <x-slot name="title">{{ __('Macroprocesos Registrados') }}</x-slot>
        <x-slot name="description">{{ __('Listado de macroprocesos creados en el sistema') }}</x-slot>
    </x-section-title>

    <div class="col-span-1 md:col-span-2 bg-white rounded-tl-md rounded-tr-md shadow-sm p-1">
        <ul class="divide-y divide-gray-200 border">
            @foreach ($macroProcesses as $macroProcess)
                <li class="flex justify-between items-start gap-2 p-2" id="item-{{ $macroProcess->id }}">

                    <div class="grid gap-2 w-1/3">
                        <div class="w-full sm:w-2/3 md:w-3/4 lg:w-4/5 max-w-full mx-auto gap-2">
                            <div class="flex flex-col items-center justify-items-center">
                                <div class="flex justify-center items-center h-14 w-14">
                                    @php
                                        $icon = "svg.macroprocess.$macroProcess->icon";
                                    @endphp
                                    <x-dynamic-component :component="$icon" width="100%" height="100%"
                                        class="flex-shrink-0" />
                                </div>
                                <div class="text-sm font-bold truncate whitespace-normal text-center w-full">
                                    {{ $macroProcess->name . ' ' . $macroProcess->childs }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-center gap-2 border-t-1 mt-2">
                            @livewire('macro-process-delete')
                            <x-button class="bg-green-600 text-sm" title="Visualizar registro">
                                <i class="fa-solid fa-eye"></i>
                            </x-button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-1"
                        id="child-list-{{ $macroProcess->id }}">
                        <div class="col-span-full sm:col-span-2 md:col-span-4 lg:col-span-3">
                            <div class="flex flex-col bg-gray-100 p-4 rounded-md items-center justify-center h-full">
                                <p class="w-32 text-center">{{ __('Macroprocesos') }}</p>
                                <ul class="grid gap-2 w-full items-center">
                                    @livewire('macro-processes-childs', ['items' => $macroProcess->children])
                                </ul>
                            </div>
                        </div>
                        <div class="col-span-full sm:col-span-2 md:col-span-2 lg:col-span-3">
                            <div class="flex flex-col bg-gray-100 p-4 rounded-md items-center justify-center h-full">
                                <p class="w-32 text-center">{{ __('Areas') }}</p>
                                <ul class="grid gap-2 w-full items-center">
                                    @livewire('macro-processes-childs', ['items' => $macroProcess->children])
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
