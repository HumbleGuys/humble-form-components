<form
    x-data="form"
    {!! $attributes->merge(['class' => 'form']) !!}
>
    {!! $slot !!}
</form>