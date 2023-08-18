<button {{ $attributes->merge(['type' => 'submit', 'class' => sprintf('inline-flex items-center px-4 py-2 bg-%s-600
    border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none
    focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 hover:bg-%s-500 focus:ring-%s-500', $color ?? 'green',
    $color ?? 'green', $color ?? 'green')]) }}>
    {{ $slot }}
</button>
