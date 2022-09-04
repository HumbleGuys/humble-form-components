@props([
    'name',
    'items',
    'placeholder' => null,
    'optionLabel' => 'label',
    'optionValue' => 'value',
])

<select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => 'input select']) }}
    @if (!$attributes->has('x-model'))
        x-model="formData.{{ $name }}"
    @endif
>
    @if ($placeholder)
        <option 
            value=""
            disabled
            hidden
            selected    
        >
            {{ $placeholder }}
        </option>
    @endif

    @foreach ($items as $item)
        <option value="{{ is_array($item) ? $item[$optionValue] : $item->{$optionValue} }}">
            {{ is_array($item) ? $item[$optionLabel] : $item->{$optionLabel} }}
        </option>
    @endforeach
</select>