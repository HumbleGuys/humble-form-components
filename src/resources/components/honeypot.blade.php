@props([
    'name'
])

<div id="{{ $name }}_wrap" style="display: none" aria-hidden="true">
    <input 
        id="{{ $name }}"
        name="{{ $name }}"
        type="text"
        value=""
        autocomplete="nope"
        tabindex="-1"
        x-model="formData.{{ $name }}"
    >
</div>