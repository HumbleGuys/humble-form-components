@props([
    'name',
])

<div class="form__elementHolder">
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'input form__inputElement', 'type' => 'text']) }}
        @if (!$attributes->has('x-model'))
            x-model="formData.{{ $name }}"
        @endif
    >

    @if (!empty($icon))
        {!! $icon !!}
    @elseif ($attributes->get('type') === 'date')
        <svg xmlns="http://www.w3.org/2000/svg" class="input__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
    @endif
</div>