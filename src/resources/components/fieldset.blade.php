@props([
    'legend'
])

<fieldset {{ $attributes->merge(['class' => 'fieldset form__elementHolder']) }}>
    @if (!empty($legend))
        <legend class="fieldset__legend label">
            {{ $legend }}
        </legend>
    @endif

    {!! $slot !!}
</fieldset>