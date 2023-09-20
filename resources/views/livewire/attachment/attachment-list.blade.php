<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                <td class="px-6 py-4 whitespace-nowrap text-center" title="type: {{ $document->extension }}">
                    <i class="{{ $document->extension = 'pdf' ? 'fa fa-file-pdf-o' :  'fa fa-file-excel-o'}}"></i>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <div class="flex space-x-2">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            href="{{ route('attachment-show',['id'=>$document['id']]) }}"
                            title="{{ $document['name'] }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fa fa-upload"></i>

                        </button>
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
                            wire:click="downloadFile({{ $document['id'] }})">
                            <i class="fa fa-download"></i>
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            wire:click="deleteFile({{ $document['id'] }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach

            @if ($selectedItem->documents()->count() < 3) @for ($i=0; $i < 3 - $selectedItem->documents()->count();
                $i++)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        SIN ARCHIVO
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <!-- Coloca aquí el contenido de las celdas de la fila -->
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex space-x-2">
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa-solid fa-eye"></i>

                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa fa-upload"></i>

                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa fa-download"></i>
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
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