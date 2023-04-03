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
                        <li class="flex flex-col my-1 gap gap-3">
                            <div>
                                @php
                                    $icon = 'svg.macroprocess.estrategico';
                                @endphp

                                @foreach (App\Models\macro_processes::all() as $macroProcess)
                                    <div wire.key={{ $macroProcess->id }} class="my-2 py-2">
                                        <div class="flex gap-3">
                                            <div class="flex items-center justify-between overflow-hidden">

                                                <div class="h-24 w-24">
                                                    <x-dynamic-component :component="$icon" width='100%'
                                                        height='100%' />
                                                </div>

                                                <div class="flex items-center w-52 overflow-hidden rounded-md">
                                                    <div class="flex-1">
                                                        <div class="px-2 text-sm font-bold truncate">
                                                            {{ $macroProcess->name }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="grid grid-2 sm:grid-4 md:grid-8 gap-2">
                                                    <div class="flex">
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-home text-gray-600">A</i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-cog text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-book text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-briefcase text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-users text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-globe text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-shopping-cart text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-music text-gray-600"></i>
                                                        </div>
                                                    </div>


                                                    <x-section-border class="h-full" />

                                                    <div class="flex">
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-home text-gray-600">A</i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-cog text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-book text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-briefcase text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-users text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-globe text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-shopping-cart text-gray-600"></i>
                                                        </div>
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                                            <i class="fas fa-music text-gray-600"></i>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <x-section-border />

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
