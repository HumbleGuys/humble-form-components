@props([
    'name',
])

<textarea 
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'textarea input']) }}
    @if (!$attributes->has('x-model'))
        x-model="formData.{{ $name }}"
    @endif
></textarea>
