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
    @if (!empty($items))
        @foreach ($items as $item)
            <x-form::radioButton
                :label="is_array($item) ? $item[$optionLabel] : $item->{$optionLabel}"
                :value="is_array($item) ? $item[$optionValue] : $item->{$optionValue}"
            />
        @endforeach
    @else
        {!! $slot !!}
    @endif
</x-form::fieldset>