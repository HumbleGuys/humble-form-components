@props([
    'label',
    'value'
])

@aware([
    'name'
])

<div class="radioButton">
    <input 
        type="radio"
        id="{{ $value }}" 
        name="{{ $name }}" 
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'radioButton__input']) }}
        @if (!$attributes->has('x-model'))
            x-model="formData.{{ $name }}"
        @endif
    >

    <label 
        for="{{ $value }}"
        class="radioButton__label"    
    >
        {{ $label }}
    </label>
</div>