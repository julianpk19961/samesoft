<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="md:grid md:grid-cols-3 md:gap-6">

        <x-section-title>
            <x-slot name="title">{{ __('Información Macroprocesos') }}</x-slot>
            <x-slot name="description">
                {{ __('A continuación podrá ver un formulario de creación para agregar uno o más macroprocesos') }}
            </x-slot>
        </x-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">

            <form wire.submit.prevent="MacroProcessForm" action="/macroprocess" method="POST" class="w-full">

                <div
                    class="px-4 py-5 bg-white sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }} ">

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"
                            autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">

                        <x-label for="macroprocess_id" value="{{ __('Asignado') }}" />

                        <x-input-selection id="macroprocess_id" name="macroprocess_id" class="mt-1- block w-full"
                            wire:model.defer="macroprocess_id">

                            <option value="" class="text-gray-500">Macroproceso maestro</option>

                            @isset($macroProcesses)
                                @foreach ($macroProcesses as $key => $column)
                                    <option value=""></option>
                                @endforeach
                            @endisset

                        </x-input-selection>


                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="description" value="{{ __('Descripción') }}" />
                        <textarea name="description" id="description" rows="3"
                            class="w-full mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            wire:model.defer="description"></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-300 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-button>
                        {{ __('Crear') }}
                    </x-button>
                </div>

            </form>

        </div>
        {{-- <x-slot name="title">
            {{ __('Información Macroprocesos') }}
        </x-slot>

        <x-slot name="description">
            {{ __('A continuación podrá ver un formulario de creación para agregar uno o más macroprocesos') }}
        </x-slot>

        <x-slot name="form" method="POST">

            <div class="col-span-12 sm:col-span-10">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"
                    autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="col-span-12 sm:col-span-10">

                <x-label for="macroprocess_id" value="{{ __('Asignado') }}" />

                <x-input-selection id="macroprocess_id" name="macroprocess_id" class="mt-1- block w-full"
                    wire:model.defer="macroprocess_id">

                    <option value="" class="text-gray-500">Macroproceso maestro</option>

                    @isset($macroProcesses)
                        @foreach ($macroProcesses as $key => $column)
                            <option value=""></option>
                        @endforeach
                    @endisset

                </x-input-selection>


                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="col-span-12 sm:col-span-10">
                <x-label for="description" value="{{ __('Descripción') }}" />
                <textarea name="description" id="description" rows="3"
                    class="w-full mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    wire:model.defer="description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot> --}}

    </div>
</div>
