@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-dark-500']) }}>
    {{ $value ?? $slot }}
</label>
