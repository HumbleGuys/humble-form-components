<button {{ $attributes->merge(['class' => 'button']) }}>
    <div class="button__inner">
        {!! $slot !!}
    </div>

    {!! $outside ?? null !!}
</button>