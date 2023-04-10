<x-button wire:click="$toggle('deleteConfirm')" wire:loading.attr="disabled" class="bg-red-600 flex-shrink-0"
    title="Eliminar/Inactivar Registro">
    <i class="fa-solid fa-trash"></i>
</x-button>

<x-confirmation-modal wire:model="deleteConfirm">

    <x-slot name="title">
        {{ __('Guardar registro') }}
    </x-slot>

    <x-slot name="content">
        {{ __('¿Está seguro de eliminar el macroproceso?') }}
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('confirming')" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-secondary-button>

        <x-danger-button class="ml-2" wire:click="submit" wire:loading.attr="disabled">
            {{ __('Guardar') }}
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>
