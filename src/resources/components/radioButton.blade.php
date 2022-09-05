@props([
    'label',
    'value'
])

@aware([
    'name',
    'radioClass',
    'radioLabelClass',
    'radioInputClass'
])

<div {{ $attributes->except(['x-model', 'required', 'disabled'])->merge(['class' => "radioButton {$radioClass}"]) }}>
    <input 
        type="radio"
        id="{{ $value }}" 
        name="{{ $name }}" 
        value="{{ $value }}"
        {{ $attributes->only(['x-model', 'required', 'disabled']) }}
        class="radioButton__input {{ $radioInputClass }}"
        @if (!$attributes->has('x-model'))
            x-model="formData.{{ $name }}"
        @endif
    >

    <label 
        for="{{ $value }}"
        class="radioButton__label {{ $radioLabelClass }}"    
    >
        {{ $label }}
    </label>
</div>