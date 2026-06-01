@props(['priority'])

@php
$classes = match($priority) {
    'low' => 'bg-gray-200 text-text-secondary',
    'medium' => 'bg-info text-info-text',
    'high' => 'bg-danger text-danger-text',
    default => 'bg-gray-100 text-text-secondary',
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
