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
        <link rel="stylesheet" href="{{ asset('../vendor/humble-guys/humble-form-components/public/resources/dist/assets/index.11d3527d.css') }}">
        <script module defer src="{{ asset('../vendor/humble-guys/humble-form-components/public/resources/dist/assets/index.11d3527d.js') }}"></script>
    @endpush   
@endonce 