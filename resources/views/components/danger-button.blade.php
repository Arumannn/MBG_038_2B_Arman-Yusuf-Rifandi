<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105 hover:shadow-lg']) }}
        style="background: linear-gradient(145deg, #dc2626 0%, #b91c1c 100%); border: 1px solid #dc2626; box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3); focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-red-100;">
    {{ $slot }}
</button>
