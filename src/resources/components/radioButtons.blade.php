@props([
    'name',
    'items',
    'label' => null,
    'optionLabel' => 'label',
    'optionValue' => 'value',
])

<x-form::fieldset 
    :legend="$label"
    class="radioButtons"    
>
    @foreach ($items as $item)
        <x-form::radioButton 
            :name="$name"
            :label="is_array($item) ? $item[$optionLabel] : $item->{$optionLabel}"
            :value="is_array($item) ? $item[$optionValue] : $item->{$optionValue}"
        />
    @endforeach
</x-form::fieldset>