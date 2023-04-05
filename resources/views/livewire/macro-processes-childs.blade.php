<div class="flex gap gap-2 overflow-hidden">
    <div wire:click="scrollLeft"
        class="w-10 h-10 rounded-full bg-blue-300 flex items-center justify-center cursor-pointer">
        <i class="fas fa-check text-red-600"></i>
    </div>
    <div class="flex gap gap-2" wire:ignore>
        {{-- @if ($macroProcess->child)
            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                <i class="fas fa-home text-red-600">A</i>
            </div>
        @endif --}}
        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fas fa-home text-gray-600">A</i>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fas fa-cog text-gray-600"></i>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fas fa-users text-gray-600"></i>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fas fa-globe text-gray-600"></i>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fas fa-shopping-cart text-gray-600"></i>
        </div>
        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
            <i class="fas fa-music text-gray-600"></i>
        </div>
    </div>
    <div wire:click="scrollRight"
        class="w-10 h-10 rounded-full bg-blue-300 flex items-center justify-center cursor-pointer">
        <i class="fas fa-chevron-right text-gray-600"></i>
    </div>
</div>
