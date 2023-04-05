<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">

        <x-section-title>
            <x-slot name="title">{{ __('Macroprocesos Registrados') }}</x-slot>
            <x-slot name="description">
                {{ __('Listado de macroprocesos creados en el sistema: ') }}
            </x-slot>
        </x-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm-tr-md">
                <div class="mt-8 md:mt-0">
                    <ul role="list" class="-my-6 divide-gray-200">
                        <li class="flex flex-col my-1 gap gap-6">
                            <div class="mt-2">
                                @foreach (App\Models\macro_processes::all() as $macroProcess)
                                    @php
                                        $icon = "svg.macroprocess.$macroProcess->icon";
                                    @endphp


                                    <div wire.key={{ $macroProcess->id }} class="py-2">

                                        <div class="flex gap-8 justify-around">
                                            <div class="flex items-center justify-between overflow-hidden gap-2">

                                                <div
                                                    class="flex flex-col w-56 overflow-hidden rounded-md justify-center mx-2 flex-shrink-0">

                                                    <div class="flex-1">
                                                        <div class="flex flex-col items-center justify-center">
                                                            <div class="flex justify-center items-center h-24 w-24">
                                                                <x-dynamic-component :component="$icon" width='100%'
                                                                    height='100%' />
                                                            </div>
                                                            <div
                                                                class="text-sm font-bold truncate whitespace-normal text-center">
                                                                {{ $macroProcess->name }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="flex items-center justify-center gap-2 border-t-1 mt-2 overflow-hidden">
                                                        @livewire('macro-process-delete')
                                                        <x-button class="bg-green-600">
                                                            {{ __('Visualizar') }}
                                                        </x-button>
                                                    </div>
                                                </div>

                                                <div class="grid grid-2 sm:grid-4 md:grid-8 gap-1 flex-grow">
                                                    <div class="flex gap-2">
                                                        <div
                                                            class="flex bg-gray-100 p-4 w-full col-span-2 items-center">
                                                            <p class="w-32 flex-1">{{ __('Macroprocesos') }}</p>
                                                            <i class="fas fa-check text-red-600"></i>

                                                            @livewire('macro-processes-childs')
                                                            {{-- <div class="flex gap gap-2">
                                                                @if ($macroProcess->child)
                                                                    <div
                                                                        class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                        <i class="fas fa-home text-red-600">A</i>
                                                                    </div>
                                                                @endif
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-home text-gray-600">A</i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-cog text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-book text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-briefcase text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-users text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-globe text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-shopping-cart text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-music text-gray-600"></i>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>

                                                    <div class="flex gap-2">
                                                        <div
                                                            class="flex bg-gray-100 p-4 w-full col-span-2 items-center">
                                                            <p class="w-32 flex-1">{{ __('Areas') }}</p>
                                                            <div class="flex gap gap-2">
                                                                @if ($macroProcess->child)
                                                                    <div
                                                                        class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                        <i class="fas fa-home text-red-600">A</i>
                                                                    </div>
                                                                @endif
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-home text-gray-600">A</i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-cog text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-book text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-briefcase text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-users text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-globe text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-shopping-cart text-gray-600"></i>
                                                                </div>
                                                                <div
                                                                    class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                                    <i class="fas fa-music text-gray-600"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <x-section-border /> --}}

                                    </div>
                                @endforeach
                            </div>

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
