<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105 hover:shadow-lg']) }}
        style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); border: 1px solid #ffbb31; box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3); focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-yellow-100;">
    {{ $slot }}
</button>
