@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm mb-2 transition-all duration-300']) }}
       style="color: #040348;">
    {{ $value ?? $slot }}
</label>
