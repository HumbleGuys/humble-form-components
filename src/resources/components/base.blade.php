@props([
    'name',
    'action',
    'method' => 'POST',
    'initialData' => []
])

<form
    x-data="form({
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
        <link rel="stylesheet" href="{{ asset('../vendor/humble-guys/humble-form-components/public/resources/dist/style.css?v=0.0.4') }}">
        <script module defer src="{{ asset('../vendor/humble-guys/humble-form-components/public/resources/dist/humble-form-components.umd.js?v=0.0.4') }}"></script>
    @endpush   
@endonce 