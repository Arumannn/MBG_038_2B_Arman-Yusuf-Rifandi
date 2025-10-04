<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-2" style="color: #040348;">Selamat Datang Kembali</h1>
        <p class="text-lg" style="color: #949ea2;">Silakan masuk ke akun Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-2 focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition-all duration-300" 
                       style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #ffbb31;" 
                       name="remember">
                <span class="ms-2 text-sm font-medium" style="color: #040348;">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-medium hover:underline transition-all duration-300" 
                   style="color: #ffbb31; hover:color: #e6a52a;" 
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-8">
            <x-primary-button class="w-full justify-center py-4 text-lg">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm" style="color: #949ea2;">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-semibold hover:underline transition-all duration-300" style="color: #ffbb31;">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
