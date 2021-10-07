@props(['first' => false])

<fieldset {{ $attributes->merge(['class' => $first ? '' : 'mt-4']) }}>
    {{ $slot }}
</fieldset>
