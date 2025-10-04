@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-3 rounded-xl text-sm font-semibold leading-5 text-white focus:outline-none transition-all duration-300 transform hover:scale-105'
            : 'inline-flex items-center px-4 py-3 rounded-xl text-sm font-medium leading-5 text-white hover:text-yellow-300 focus:outline-none transition-all duration-300 transform hover:scale-105 hover:bg-white hover:bg-opacity-10';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}
   @if($active ?? false)
   style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.2) 0%, rgba(255, 187, 49, 0.3) 100%); border: 1px solid rgba(255, 187, 49, 0.5); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.2);"
   @else
   style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.05) 0%, rgba(255, 187, 49, 0.1) 100%); border: 1px solid rgba(255, 187, 49, 0.2);"
   @endif>
    {{ $slot }}
</a>
