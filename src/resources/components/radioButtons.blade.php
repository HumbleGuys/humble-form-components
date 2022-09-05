@props([
    'name',
    'items',
    'legend' => null,
    'optionLabel' => 'label',
    'optionValue' => 'value',
])

<x-form::fieldset 
    :legend="$legend"
    class="radioButtons"    
>
    @foreach ($items as $item)
        <div class="radioButton">
            <input 
                type="radio" 
                id="{{ is_array($item) ? $item[$optionValue] : $item->{$optionValue} }}" 
                name="{{ $name }}" 
                value="{{ is_array($item) ? $item[$optionValue] : $item->{$optionValue} }}"
                {{ $attributes->merge(['class' => 'radioButton__input']) }}
                @if (!$attributes->has('x-model'))
                    x-model="formData.{{ $name }}"
                @endif
            >

            <label 
                for="{{ is_array($item) ? $item[$optionValue] : $item->{$optionValue} }}"
                class="radioButton__label"    
            >
                {{ is_array($item) ? $item[$optionLabel] : $item->{$optionLabel} }}
            </label>
        </div>
    @endforeach
</x-form::fieldset>