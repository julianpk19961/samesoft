<div class="flex justify-between items-center overflow-hidden gap-2">
    <button wire:click="moveLeft" class="w-10 h-10 rounded-full bg-slate-300 flex-shrink-0">
        ←
    </button>
    <div class="grid grid-cols-6 max-w-full gap-2" wire:ignore style="transform: translateX({{ -$position * 100 }}%)">

        @if ($items->count() > 0)

            @foreach ($items as $child)
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-home text-red-600" title="{{ $child->name }}"></i>
                </div>
            @endforeach

        @endif

        @php($i = $items->count() > 0 ? $items->count() : 0)

        @while ($i < 6)
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                <i class="fa-solid fa-border-none"></i>
            </div>
            @php($i = $i + 1)
        @endwhile
    </div>
    <button wire:click="moveRight" class="w-10 h-10 rounded-full bg-slate-300 flex-shrink-0">
        →
    </button>
</div>
