@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-success-text']) }}>
        {{ $status }}
    </div>
@endif
