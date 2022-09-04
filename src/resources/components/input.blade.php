@props([
    'name',
])

<input
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'input', 'type' => 'text']) }}
    @if (!$attributes->has('x-model'))
        x-model="formData.{{ $name }}"
    @endif
>
