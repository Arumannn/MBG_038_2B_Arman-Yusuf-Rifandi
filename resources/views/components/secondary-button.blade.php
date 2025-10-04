<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 border rounded-xl font-semibold text-sm uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25 transition-all duration-300 transform hover:scale-105 hover:shadow-lg']) }}
        style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #040348; color: #040348; box-shadow: 0 4px 15px rgba(4, 3, 72, 0.1); focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-yellow-100;">
    {{ $slot }}
</button>
