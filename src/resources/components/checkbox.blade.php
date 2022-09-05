@props([
    'name',
    'inputClass' => '',
    'labelClass' => ''
])

<div {{ $attributes->except(['x-model', 'required', 'disabled'])->merge(['class' => 'checkbox']) }}>
    <input 
        type="checkbox" 
        id="{{ $name }}"
        name="{{ $name }}"
        class="checkbox__input {{ $inputClass }}"
        {{ $attributes->only(['x-model', 'required', 'disabled']) }}
        @if (!$attributes->has('x-model'))
            x-model="formData.{{ $name }}"
        @endif
    >

    <label 
        for="{{ $name }}"
        class="checkbox__label {{ $labelClass }}"
    >
        {!! $slot !!}
    </label>
</div>