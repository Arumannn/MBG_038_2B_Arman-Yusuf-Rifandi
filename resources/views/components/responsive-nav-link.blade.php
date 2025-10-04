@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-4 pe-4 py-3 text-start text-base font-semibold text-white focus:outline-none transition-all duration-300 transform hover:scale-105'
            : 'block w-full ps-4 pe-4 py-3 text-start text-base font-medium text-white hover:text-yellow-300 focus:outline-none transition-all duration-300 transform hover:scale-105';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}
   @if($active ?? false)
   style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.2) 0%, rgba(255, 187, 49, 0.3) 100%); border-left: 4px solid #ffbb31; box-shadow: 0 4px 15px rgba(255, 187, 49, 0.2);"
   @else
   style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.05) 0%, rgba(255, 187, 49, 0.1) 100%); border-left: 4px solid rgba(255, 187, 49, 0.3);"
   @endif>
    {{ $slot }}
</a>
