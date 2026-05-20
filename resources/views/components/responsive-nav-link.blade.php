@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-cream text-start text-base font-medium text-cream bg-sidebar-600 focus:outline-none focus:text-cream focus:bg-sidebar-500 focus:border-cream transition duration-150 ease-in-out'
    : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-cream/80 hover:text-cream hover:bg-white/10 hover:border-cream/30 focus:outline-none focus:text-cream focus:bg-white/10 focus:border-cream/30 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
