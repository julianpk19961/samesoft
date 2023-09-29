<x-button wire:click="delete({{ $macroProcess ?? '' }})"
    class="{{ $macroProcess->active == '1' ?'bg-red-600':'bg-green-600' }} flex-shrink-0"
    title="Eliminar/Inactivar Registro">
    <i class="fa-solid fa-trash"></i>
</x-button>