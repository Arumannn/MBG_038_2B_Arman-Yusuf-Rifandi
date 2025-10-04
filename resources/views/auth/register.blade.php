<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-2" style="color: #040348;">Buat Akun Baru</h1>
        <p class="text-lg" style="color: #949ea2;">Bergabunglah dengan kami hari ini</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-8">
            <x-primary-button class="w-full justify-center py-4 text-lg">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm" style="color: #949ea2;">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-semibold hover:underline transition-all duration-300" style="color: #ffbb31;">
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
