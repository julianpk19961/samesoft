<div class="flex justify-center">
    <div class="border border-gray-300 rounded-lg">
        <div class="flex">
            @foreach ($tabs as $tabTitle => $tabContent)
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
        <div class="p-2 ">
            @if ($activeTab)
                <div class="overflow-x-auto rounded-lg">
                    <table class="w-full bg-white border border-gray-300 " style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800" row="2">
                                    Nombre</th>
                                <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                    Encargado</th>
                                <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                    Descripción
                                </th>
                                <th class="py-2 px-4 border-gray-300 font-medium text-white bg-gray-800">
                                    opciones</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @if ($items->isEmpty())
                                @for ($i = 0; $i < 2; $i++)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-100 empty-cell whitespace-normal break-words text-xs text-center bg-gray-300"
                                            colspan="4">&nbsp;
                                            No se encontraron registros
                                        </td>
                                        {{-- <td class="py-2 px-4 border-b border-gray-300">
                                            <button
                                                class="px-3 py-2 text-xs bg-gray-300 text-gray-500 font-semibold rounded w-full"
                                                disabled> <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td> --}}
                                    </tr>
                                @endfor
                            @else
                                @foreach ($items as $item)
                                    <tr class="text-xs">
                                        <td class="py-2 px-4 border-b border-gray-150 whitespace-normal break-words"
                                            style="width: {{ $maxNameLength }}rem;">
                                            {{ Str::lower($item->name) }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-150">{{ $item->column2 }}</td>
                                        <td class="py-2 px-4 border-b border-gray-150">{{ $item->description }}</td>
                                        <td class="py-2 px-4 border-b border-gray-150">
                                            <button
                                                class="px-3 py-2 text-xs bg-red-500 hover:bg-red-700 text-white font-semibold rounded w-full">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            {{-- <button class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Eliminar</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
