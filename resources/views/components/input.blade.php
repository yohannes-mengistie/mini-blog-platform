@props(['id', 'name', 'type' => 'text', 'value' => '', 'required' => false, 'autofocus' => false])

<input 
    id="{{ $id }}"
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    {{ $required ? 'required' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500']) }}
>