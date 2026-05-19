@php
    $classes = match($priority) {
        'low' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        'medium' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
        'high' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
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
