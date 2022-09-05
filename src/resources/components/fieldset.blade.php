<fieldset {{ $attributes->merge(['class' => 'fieldset']) }}>
    @if (!empty($legend))
        <legend class="fieldset__legend label">
            {{ $legend }}
        </legend>
    @endif

    {!! $slot !!}
</fieldset>