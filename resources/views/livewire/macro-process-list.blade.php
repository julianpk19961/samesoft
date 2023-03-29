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
                                @foreach (App\Models\macro_processes::all() as $macroProcess)
                                    <div wire.key={{ $macroProcess->id }} class="my-2">
                                        <div class="flex gap-3">
                                            <div class="h-24 w-24 overflow-hidden rounded-md border border-gray-200">
                                                @php
                                                    $icon = 'svg.macroprocess.satisfaccion';
                                                @endphp

                                                <x-dynamic-component :component="$icon" width='100%' height='100%'
                                                    class="mt-2" />
                                            </div>
                                            <div class="col-span-2 py-5">

                                                {{ $macroProcess->name }}

                                                @foreach ($macroProcess->children as $subProcess)
                                                    <dl>
                                                        <dt>
                                                            - {{ $subProcess->name }}
                                                        </dt>
                                                    </dl>
                                                @endforeach

                                            </div>
                                        </div>
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
