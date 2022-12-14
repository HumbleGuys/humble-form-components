@props([
    'name',
    'items',
    'label' => null,
    'placeholder' => null,
    'optionLabel' => 'label',
    'optionValue' => 'value',
    'labelClass' => '',
    'innerClass' => '',
    'inputClass' => '',
    'chevronClass' => ''
])

<div {{ $attributes->except(['x-model', 'required', 'disabled'])->merge(['class' => 'form__elementHolder']) }}>
    @if (!empty($label))
        <x-form::label 
            :for="$name"
            :class="$labelClass"
        >
            {{ $label }}
        </x-form::label>
    @endif

    <div class="form__elementInner {{ $innerClass }}">
        @if (!empty($icon))
            {!! $icon !!}
        @endif

        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes->only(['x-model', 'required', 'disabled']) }}
            class="select form__inputElement {{ $inputClass }}"
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

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="select__chevron {{ $chevronClass }}"><polyline points="6 9 12 15 18 9"></polyline></svg>
    </div>
</div>
