<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">

        <x-section-title>
            <x-slot name="title">{{ __('Crear Área') }}</x-slot>
            <x-slot name="description">
                {{ __('A continuación podrá ver un formulario de creación para agregar una o más áreas según sea
                necesario.') }}
            </x-slot>
        </x-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">

            <form wire:submit.prevent="" class="w-full py-5">
                <div
                    class="px-4 bg-white sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }} ">

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" class="mb-2 block w-full" wire:model="name"
                            autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">

                        <x-label for="macro_process_id" value="{{ __('Asignado A') }}" />

                        <x-input-selection id="macro_process_id" name="macro_process_id" class="mt-1 w-full mb-2"
                            wire:model="macro_process_id">

                            <option value="" class="text-gray-500">
                                {{ __('Selección Macroproceso') }}
                            </option>


                            @if ($this->macroProcesses->count() > 0)
                            @foreach ($this->macroProcesses as $macroProcess)
                            <option value="{{ $macroProcess->id }}" class="text-gray-500">
                                {{ __("$macroProcess->name") }}</option>
                            @endforeach
                            @endif
                        </x-input-selection>
                        <x-input-error for="macro_process_id" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="description" value="{{ __('Descripción') }}" />
                        <textarea name="description" id="description" rows="3"
                            class="w-full mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            wire:model="description"></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success text-green-400 bg-white w-full text-end px-1 py-1">
                            {{ session('message') }}
                            <svg class="inline-flex mr-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        @endif
                    </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                    <x-secondary-button wire:click="clear" wire:loading.attr="disabled" class="m-1">
                        {{ __('Limpiar') }}
                    </x-secondary-button>

                    <x-button wire:click="$toggle('confirming')" wire:loading.attr="disabled">
                        {{ __('Guardar') }}
                    </x-button>

                    <x-confirmation-modal wire:model="confirming">

                        <x-slot name="title">
                            {{ __('Guardar registro') }}
                        </x-slot>

                        <x-slot name="content">
                            {{ __("¿Está seguro de crear el Area: $this->name?") }}
                        </x-slot>

                        <x-slot name="footer">
                            <x-secondary-button wire:click="$toggle('confirming')" wire:loading.attr="disabled">
                                {{ __('Cancelar') }}
                            </x-secondary-button>

                            <x-button class="ml-2" wire:click="submit" wire:loading.attr="disabled" color="green">
                                {{ __('Guardar') }}
                            </x-button>
                        </x-slot>


                    </x-confirmation-modal>

                </div>
            </form>

        </div>
    </div>
</div>