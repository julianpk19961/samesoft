<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">

        <x-section-title>
            <x-slot name="title">{{ __('Información Macroprocesos') }}</x-slot>
            <x-slot name="description">
                {{ __('A continuación podrá ver un formulario de creación para agregar uno o más macroprocesos') }}
            </x-slot>
        </x-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">

            <form wire:submit.prevent="submit" action="/macroprocesos" class="w-full">
                <div
                    class="px-4 py-5 bg-white sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }} ">

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name"
                            autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">

                        <x-label for="macroprocess_id" value="{{ __('Asignado') }}" />

                        <x-input-selection id="macroprocess_id" name="macroprocess_id" class="mt-1- block w-full"
                            wire:model="macroprocess_id">

                            <option value="" class="text-gray-500">{{ __('SELECCION MACROPROCESO MAESTRO') }}
                            </option>

                            @php
                                $macroprocesses = App\Models\macro_processes::all();
                            @endphp

                            @if ($macroprocesses->count() > 0)

                                @foreach ($macroprocesses as $macroProcess)
                                    <option value="{{ __($macroProcess->id) }}" class="text-gray-500">
                                        {{ $macroProcess->name }}</option>
                                @endforeach

                            @endif

                        </x-input-selection>

                        <x-input-error for="macroprocess_id" class="mt-2" />
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



                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Guardar') }}
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>
