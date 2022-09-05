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