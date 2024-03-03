@props(['name', 'action', 'method' => 'POST', 'initialData' => [], 'recaptcha' => null])

<form
    x-data="form({
        recaptcha: {{ json_encode($recaptcha) }},
        initialData: {{ json_encode($initialData) }}
    })"
    name="{{ $name }}"
    action="{{ $action }}"
    method="{{ $method }}"
    {!! $attributes->merge(['class' => 'form']) !!}
    @submit.prevent="handleSubmit"
>
    {!! $slot !!}
</form>

@once
    @push('head')
        <link
            rel="stylesheet"
            href="{{ asset('../vendor/humble-guys/humble-form-components/public/resources/dist/style.css?v=0.3.0') }}"
        >
        <script
            module
            defer
            src="{{ asset('../vendor/humble-guys/humble-form-components/public/resources/dist/humble-form-components.umd.js?v=0.3.0') }}"
        ></script>

        @if (!empty($recaptcha))
            <script src="https://www.google.com/recaptcha/api.js?render={{ $recaptcha }}"></script>
        @endif
    @endpush
@endonce
