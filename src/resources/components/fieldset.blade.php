@props([
    'legend',
    'labelClass' => ''
])

<fieldset {{ $attributes->merge(['class' => 'fieldset form__elementHolder']) }}>
    @if (!empty($legend))
        <legend class="fieldset__legend label {{ $labelClass }}">
            {{ $legend }}
        </legend>
    @endif

    {!! $slot !!}
</fieldset>