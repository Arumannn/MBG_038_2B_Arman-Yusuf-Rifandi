<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        
            <style>
            :root {
                --primary-accent: #ffbb31;
                --primary-dark: #040348;
                --neutral-tone: #949ea2;
                --soft-pink: #c8a6a1;
                --background-neutral: #cbcdc4;
                --light-background: #f1e9dc;
            }
            </style>
    </head>
    <body class="font-sans antialiased" style="background: linear-gradient(135deg, #f1e9dc 0%, #cbcdc4 100%); min-height: 100vh;">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="w-full py-6 px-6 lg:px-8">
                <div class="max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" 
                             style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                            <span class="text-2xl">🏪</span>
                        </div>
                        <h1 class="text-2xl font-bold" style="color: #040348;">Sistem Manajemen Makanan Bergizi Gratis</h1>
                    </div>
                    
            @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                    @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                   style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                            Dashboard
                        </a>
                    @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105"
                                   style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #040348; color: #040348; box-shadow: 0 4px 15px rgba(4, 3, 72, 0.1);">
                                    Masuk
                                </a>
                        @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                       class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                       style="background: linear-gradient(145deg, #c8a6a1 0%, #b89691 100%); box-shadow: 0 4px 15px rgba(200, 166, 161, 0.3);">
                                        Daftar
                            </a>
                        @endif
                    @endauth
                        </div>
                    @endif
                </div>
                </nav>

            <!-- Hero Section -->
            <div class="flex-1 flex items-center justify-center px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center">
                        <h1 class="text-5xl lg:text-7xl font-bold mb-8" style="color: #040348;">
                            Selamat Datang
                        </h1>


                        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                            @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center px-8 py-4 rounded-2xl text-lg font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                   style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 8px 25px rgba(255, 187, 49, 0.4);">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                    </svg>
                                    Buka Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center px-8 py-4 rounded-2xl text-lg font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                   style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 8px 25px rgba(255, 187, 49, 0.4);">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                       class="inline-flex items-center px-8 py-4 rounded-2xl text-lg font-semibold transition-all duration-300 transform hover:scale-105"
                                       style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; color: #040348; box-shadow: 0 8px 25px rgba(200, 166, 161, 0.2);">
                                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                        </svg>
                                        Buat Akun
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20">
                        <!-- Feature 1 -->
                        <div class="text-center p-8 rounded-2xl transform hover:scale-105 transition-all duration-300" 
                             style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(255, 187, 49, 0.1);">
                            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl flex items-center justify-center" 
                                 style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 8px 25px rgba(255, 187, 49, 0.3);">
                                <span class="text-3xl">📦</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4" style="color: #040348;">Kelola Inventori</h3>
                            <p class="text-lg" style="color: #949ea2;">Pantau stok bahan baku dengan sistem yang terintegrasi dan mudah digunakan.</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="text-center p-8 rounded-2xl transform hover:scale-105 transition-all duration-300" 
                             style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; box-shadow: 0 20px 40px rgba(200, 166, 161, 0.1);">
                            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl flex items-center justify-center" 
                                 style="background: linear-gradient(145deg, #c8a6a1 0%, #b89691 100%); box-shadow: 0 8px 25px rgba(200, 166, 161, 0.3);">
                                <span class="text-3xl">📋</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4" style="color: #040348;">Permintaan Otomatis</h3>
                            <p class="text-lg" style="color: #949ea2;">Sistem permintaan yang efisien antara dapur dan gudang untuk alur kerja yang lancar.</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="text-center p-8 rounded-2xl transform hover:scale-105 transition-all duration-300" 
                             style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #cbcdc4; box-shadow: 0 20px 40px rgba(203, 205, 196, 0.1);">
                            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl flex items-center justify-center" 
                                 style="background: linear-gradient(145deg, #cbcdc4 0%, #b8b9b0 100%); box-shadow: 0 8px 25px rgba(203, 205, 196, 0.3);">
                                <span class="text-3xl">📊</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4" style="color: #040348;">Laporan Real-time</h3>
                            <p class="text-lg" style="color: #949ea2;">Dapatkan insight mendalam tentang penggunaan bahan dan efisiensi operasional.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="py-8 px-6 lg:px-8 border-t" style="border-color: rgba(255, 187, 49, 0.2);">
                <div class="max-w-7xl mx-auto text-center">
                    <p class="text-lg" style="color: #949ea2;">
                        Design by cursor with Laravel & TailwindCSS
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>