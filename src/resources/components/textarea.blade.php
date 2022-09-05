@props([
    'name',
    'label' => null,
])

<div class="form__elementHolder">
    @if (!empty($label))
        <x-form::label :for="$name">
            {{ $label }}
        </x-form::label>
    @endif

    <div class="form__elemenInner">
        <textarea 
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes->merge(['class' => 'textarea form__inputElement']) }}
            @if (!$attributes->has('x-model'))
                x-model="formData.{{ $name }}"
            @endif
        ></textarea>
    </div>
</div>