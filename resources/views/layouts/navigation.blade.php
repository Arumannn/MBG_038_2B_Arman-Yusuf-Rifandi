<nav x-data="{ open: false }" class="shadow-lg" style="background: linear-gradient(135deg, #040348 0%, #1a1a5e 100%); border-bottom: 3px solid #ffbb31;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transform hover:scale-105 transition-all duration-300">
                        <x-application-logo class="block h-12 w-auto fill-current text-white" />
                    </a>
                </div>

                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->role == 'gudang')
                        <x-nav-link :href="route('gudang.bahanbaku.index')" :active="request()->routeIs('gudang.bahanbaku.*')">
                            {{ __('Bahan Baku') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('gudang.permintaan.index')" :active="request()->routeIs('gudang.permintaan.*')">
                            {{ __('Permintaan') }}
                        </x-nav-link>

                    @endif

                    @if(Auth::user()->role == 'dapur')
                        <x-nav-link :href="route('dapur.permintaan.create')" :active="request()->routeIs('dapur.permintaan.create')">
                            {{ __('Buat Permintaan') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('dapur.permintaan.history')" :active="request()->routeIs('dapur.permintaan.history')">
                            {{ __('Riwayat Permintaan') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-3 text-sm leading-4 font-medium rounded-xl text-white hover:text-yellow-300 focus:outline-none transition-all duration-300 hover:bg-white hover:bg-opacity-10" 
                                style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.1) 0%, rgba(255, 187, 49, 0.2) 100%); border: 1px solid rgba(255, 187, 49, 0.3);">
                            <div class="font-semibold">{{ Auth::user()->name }}</div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-white hover:text-yellow-300 focus:outline-none transition-all duration-300 hover:bg-white hover:bg-opacity-10" 
                        style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.1) 0%, rgba(255, 187, 49, 0.2) 100%); border: 1px solid rgba(255, 187, 49, 0.3);">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background: linear-gradient(135deg, #040348 0%, #1a1a5e 100%);">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Auth::user()->role == 'gudang')
                <x-responsive-nav-link :href="route('gudang.bahanbaku.index')" :active="request()->routeIs('gudang.bahanbaku.*')">
                    {{ __('Bahan Baku') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('gudang.permintaan.index')" :active="request()->routeIs('gudang.permintaan.*')">
                    {{ __('Permintaan') }}
                </x-responsive-nav-link>
            @endif

            @if(Auth::user()->role == 'dapur')
                <x-responsive-nav-link :href="route('dapur.permintaan.create')" :active="request()->routeIs('dapur.permintaan.create')">
                    {{ __('Buat Permintaan') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('dapur.permintaan.history')" :active="request()->routeIs('dapur.permintaan.history')">
                    {{ __('Riwayat Permintaan') }}
                </x-responsive-nav-link>
            @endif  

            
        </div>

        <div class="pt-4 pb-1 border-t" style="border-color: rgba(255, 187, 49, 0.3);">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-yellow-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>