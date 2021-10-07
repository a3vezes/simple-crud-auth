@props(['type', 'name', 'first' => false])

<x-layout.form.form_group :first="$first">
    <label for="{{ $name }}" class="text-sm font-bold">{{ ucwords(str_replace('_', ' ', $name)) }}:</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="block w-full ring-2 p-1 ring-gray-300 my-1" {{ $attributes(['value' => old($name)]) }} >
</x-layout.form.form_group>
