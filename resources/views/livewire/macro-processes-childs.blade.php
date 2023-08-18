<div class="flex justify-center">
    <div class="border border-gray-300 rounded-lg"> --PRUEBA--
        {{--
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
        --}}
        {{-- <div class="p-2">
            @if ($activeTab)
            <div class="overflow-x-auto rounded-lg">
                <table class="w-full bg-white border border-gray-300" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800" rowspan="2">
                                Nombre
                            </th>
                            <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                Encargado
                            </th>
                            <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                Descripción
                            </th>
                            <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        @if ($items->isEmpty())
                        @for ($i = 0; $i < 2; $i++) <tr>
                            <td class="py-2 px-4 border-b border-gray-100 empty-cell whitespace-normal break-words text-xs text-center bg-gray-300"
                                colspan="4">&nbsp;
                                No se encontraron registros
                            </td>

                            </tr>
                            @endfor
                            @else
                            @foreach ($items as $item)
                            <tr class="text-xs">
                                <td class="py-2 px-4 border-b border-gray-150 whitespace-normal break-words"
                                    style="width: {{ $maxNameLength }}rem;" title="{{ print_r($item->id) }}">
                                    {{ Str::title($item->name) }}
                                </td>
                                <td class="py-2 px-4 border-b border-gray-150">{{ $item->column2 }}</td>
                                <td class="py-2 px-4 border-b border-gray-150">
                                    {{ Str::lower($item->description) }}
                                </td>
                                <td class="py-2 px-4 border-b border-gray-150">
                                    @livewire('macro-process-delete', ['macroProcessId' => $item->id], key($item->id))
                                </td>
                            </tr>
                            @endforeach
                            @endif
                    </tbody>
                </table>
            </div>
            @endif
        </div> --}}
    </div>
</div>