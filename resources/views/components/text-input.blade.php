@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-2 rounded-xl shadow-sm focus:ring-2 focus:ring-offset-2 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed']) }}
       style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: rgba(255, 187, 49, 0.2); focus:ring-offset-color: #f1e9dc; box-shadow: 0 4px 15px rgba(4, 3, 72, 0.1);">
