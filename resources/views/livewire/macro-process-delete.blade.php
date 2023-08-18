<x-button wire:click="delete({{ $macroProcess ?? '' }})" wire:loading.attr="disabled" class="bg-red-600 flex-shrink-0"
    title="Eliminar/Inactivar Registro">
    <i class="fa-solid fa-trash"></i>
</x-button>