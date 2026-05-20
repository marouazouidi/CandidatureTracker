@props(['priority'])

@php
$classes = match($priority) {
    'low' => 'bg-gray-100 text-gray-800',
    'medium' => 'bg-blue-100 text-blue-800',
    'high' => 'bg-red-100 text-red-800',
    default => 'bg-gray-100 text-gray-800',
};

$labels = [
    'low' => __('Basse'),
    'medium' => __('Moyenne'),
    'high' => __('Haute'),
];
@endphp

<span class="px-2 py-1 text-xs font-semibold rounded-full {{ $classes }}">
    {{ $labels[$priority] ?? $priority }}
</span>
