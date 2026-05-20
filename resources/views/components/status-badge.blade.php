@props(['status'])

@php
$classes = match($status) {
    'to_review' => 'bg-yellow-100 text-yellow-800',
    'interview_scheduled' => 'bg-blue-100 text-blue-800',
    'offer_received' => 'bg-green-100 text-green-800',
    'rejected' => 'bg-red-100 text-red-800',
    'abandoned' => 'bg-gray-100 text-gray-800',
    default => 'bg-gray-100 text-gray-800',
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
