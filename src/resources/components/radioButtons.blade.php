@props([
    'name',
    'items',
    'label' => null,
    'optionLabel' => 'label',
    'optionValue' => 'value',
    'labelClass' => '',
    'radioClass' => '',
    'radioInputClass' => '',
    'radioLabelClass' => ''
])

<x-form::fieldset 
    :legend="$label"
    :label-class="$labelClass"
    {{ $attributes->except(['x-model', 'required', 'disabled'])->merge(['class' => 'radioButtons']) }}
>
    @if (!empty($items))
        @foreach ($items as $item)
            <x-form::radioButton
                {{ $attributes->only(['required', 'x-model']) }}
                :label="is_array($item) ? $item[$optionLabel] : $item->{$optionLabel}"
                :value="is_array($item) ? $item[$optionValue] : $item->{$optionValue}"
            />
        @endforeach
    @else
        {!! $slot !!}
    @endif
</x-form::fieldset>