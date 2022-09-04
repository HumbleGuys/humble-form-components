@props([
    'name',
    'action',
    'method' => 'post'
])

<form
    x-data="form"
    name="{{ $name }}"
    action="{{ $action }}"
    method="{{ $method }}"
    {!! $attributes->merge(['class' => 'form']) !!}
    @submit.prevent="handleSubmit"
>
    {!! $slot !!}
</form>