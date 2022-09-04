@props([
    'for' => null,
])

<label
    for="{{ $for }}"
    {{ $attributes->merge(['class' => 'label']) }}
>
    {!! $slot !!}
</label>
