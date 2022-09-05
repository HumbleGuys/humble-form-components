@props([
    'name',
])

<div class="form__elementHolder">
    <textarea 
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'textarea form__inputElement']) }}
        @if (!$attributes->has('x-model'))
            x-model="formData.{{ $name }}"
        @endif
    ></textarea>
</div>