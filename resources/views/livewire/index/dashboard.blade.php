<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="min-h-screen bg-white overflow-hidden shadow-xl sm:rounded-lg object-cover">
            <div class="grid grid-cols-2 min-h-screen bg-gradient-to-r from-cyan-500 to-blue-500 rounded m-5 p-2')]">

                <div class="grid-col justify-center space-y-1 my-auto p-1">
                    @foreach ($this->macroProcesses as $macroProcess)
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
                                
                                <p title="{{ $area->name }}"
                                    class="ml-1 bg-gray-600 text-white text-center rounded-full h-full align-middle">
                                    {{Str::limit(
                                    $area->name , 1, '')
                                    }}
                                </p>
                                {{-- <x-bubble>

                                </x-bubble> --}}

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
</div>