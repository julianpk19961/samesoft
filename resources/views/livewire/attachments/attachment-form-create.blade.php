<div>
    <div
        class="px-4 bg-gray-400 sm:p-6 shadow {{ !isset($create) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }}  mx-auto">
        <p> {{ request()->route()->getName()}} </p>

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <form wire:submit.prevent="" class="w-full py-5" enctype="multipart/form-data">
                <div class=" px-4 bg-white sm:p-6 shadow {{ !isset($create)
            ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-tr-md' }} ">

                    <div class=" col-span-12 sm:col-span-10">
                        <x-label for="fileName" value="{{ __('Name') }}" />
                        <x-input id="fileName" type="text" class="mb-2 block w-full" wire:model="fileName"
                            autocomplete="fileName" />
                        <x-input-error for="fileName" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="fileDescription" value="{{ __('Descripción') }}" />
                        <textarea name="fileDescription" id="fileDescription" rows="3"
                            class="w-full mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            wire:model="fileDescription"></textarea>
                        <x-input-error for="fileDescription" class="mt-2" />
                    </div>

                    <div class="col-span-12 sm:col-span-10">
                        <x-label for="fileAttachment" value="{{ __('Adjuntar Archivo') }}" />
                        <input type="file" name="fileAttachment" id="fileAttachment" accept=".pdf,.doc,.docx,.xls,.xlsx"
                            wire:model="fileAttachment" wire:ignore>
                        <x-input-error for="fileAttachment" class="mt-2" />
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

                    <x-button wire:click="stored" wire:loading.attr="disabled">
                        {{ __('Guardar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>