@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-xs font-black leading-5 text-gray-900 border-b-2 border-primary focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-xs font-bold leading-5 text-gray-400 hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
