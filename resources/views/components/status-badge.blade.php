@php
    $classes = match($status) {
        'to_review' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
        'interview_scheduled' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
        'offer_received' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
        'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        'abandoned' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
    };

    $labels = [
        'to_review' => __('À réviser'),
        'interview_scheduled' => __('Entretien planifié'),
        'offer_received' => __('Offre reçue'),
        'rejected' => __('Refusée'),
        'abandoned' => __('Abandonnée'),
    ];
@endphp

<span class="px-2 py-1 text-xs font-semibold rounded-full {{ $classes }}">
    {{ $labels[$status] ?? $status }}
</span>
