@props(['status'])

@php
$classes = match($status) {
    'to_review' => 'bg-warning text-warning-text',
    'interview_scheduled' => 'bg-info text-info-text',
    'offer_received' => 'bg-success text-success-text',
    'rejected' => 'bg-danger text-danger-text',
    'abandoned' => 'bg-gray-200 text-text-secondary',
    default => 'bg-gray-100 text-text-secondary',
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
