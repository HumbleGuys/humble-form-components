@props([
    'name',
    'label' => null,
    'innerClass' => '',
    'inputClass' => '',
    'labelClass' => ''
])

<div {{ $attributes->except(['x-model', 'required', 'disabled', 'type', 'placeholder'])->merge(['class' => 'form__elementHolder']) }}>
    @if (!empty($label))
        <x-form::label 
            :for="$name"
            :class="$labelClass"    
        >
            {{ $label }}
        </x-form::label>
    @endif

    <div class="form__elemenInner {{ $innerClass }}">
        <textarea 
            id="{{ $name }}"
            name="{{ $name }}"
            class="textarea form__inputElement {{ $inputClass }}"
            {{ $attributes->only(['x-model', 'required', 'disabled', 'placeholder']) }}
            @if (!$attributes->has('x-model'))
                x-model="formData.{{ $name }}"
            @endif
        ></textarea>
    </div>
</div>