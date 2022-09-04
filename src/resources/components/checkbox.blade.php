@props([
    'name'
])

<div class="checkbox">
    <input 
        type="checkbox" 
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'checkbox__input']) }}
        @if (!$attributes->has('x-model'))
            x-model="formData.{{ $name }}"
        @endif
    >

    <label 
        for="{{ $name }}"
        class="checkbox__label"
    >
        {!! $slot !!}
    </label>
</div>