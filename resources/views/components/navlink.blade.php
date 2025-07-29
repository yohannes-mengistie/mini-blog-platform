@props(['active' => false , 'type' => 'a'])

@if($type === 'a')
    <a {{ $attributes->class([
        'bg-gray-900 text-white' => $active,
        'text-gray-300 hover:bg-gray-700 hover:text-white' => !$active,
        'rounded-md px-3 py-2 text-sm font-medium'
    ]) }} 
    aria-current="{{ $active ? 'page' : 'false' }}">
        {{ $slot }}
    </a>
@elseif($type === 'button')
    <button {{ $attributes->class([
        'bg-gray-900 text-white' => $active,
        'text-gray-300 hover:bg-gray-700 hover:text-white' => !$active,
        'rounded-md px-3 py-2 text-sm font-medium'
    ]) }} 
    aria-current="{{ $active ? 'page' : 'false' }}">
        {{ $slot }}
    </button>
@endif