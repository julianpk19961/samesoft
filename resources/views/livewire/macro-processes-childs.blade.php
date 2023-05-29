<div class="flex justify-center">
    <div class="border border-gray-300 rounded-lg">
        <div class="flex">
            @foreach ($tabs as $tabTitle => $tabContent)
                <div class="px-4 py-2 cursor-pointer
                    @if ($activeTab === $tabTitle) text-blue-500 bg-gray-200
                    @else
                        text-gray-500 @endif"
                    wire:click="setActiveTab('{{ $tabTitle }}')">
                    {{ $tabTitle }}
                </div>
            @endforeach

            <div class="flex-grow"></div>
            <div class="px-4 py-2 cursor-pointer text-gray-500 bg-gray-200">
                &nbsp;
            </div>
        </div>
        <div class="p-4">
            @if ($activeTab)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-300 font-medium text-gray-700">Nombre</th>
                                <th class="py-2 px-4 border-b border-gray-300 font-medium text-gray-700">Encargado</th>
                                <th class="py-2 px-4 border-b border-gray-300 font-medium text-gray-700">Descripción</th>
                                <th class="py-2 px-4 border-b border-gray-300 font-medium text-gray-700">opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($items->isEmpty())
                                @for ($i = 0; $i < 3; $i++)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300 empty-cell" colspan="3">&nbsp;</td>
                                        <td class="py-2 px-4 border-b border-gray-300">
                                            <button class="bg-gray-300 text-gray-500 font-semibold py-2 px-4 rounded w-full" disabled>Eliminar</button>
                                        </td>
                                    </tr>
                                @endfor
                            @else
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-300">{{ $item->column1 }}</td>
                                        <td class="py-2 px-4 border-b border-gray-300">{{ $item->column2 }}</td>
                                        <td class="py-2 px-4 border-b border-gray-300">{{ $item->column3 }}</td>
                                        <td class="py-2 px-4 border-b border-gray-300">
                                            <button class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Eliminar</button>
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
