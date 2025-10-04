<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Profile') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Kelola akun Anda
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Information -->
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(4, 3, 72, 0.1);">
                <div class="p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Password Update -->
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; box-shadow: 0 20px 40px rgba(200, 166, 161, 0.1);">
                <div class="p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ef4444; box-shadow: 0 20px 40px rgba(239, 68, 68, 0.1);">
                <div class="p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
