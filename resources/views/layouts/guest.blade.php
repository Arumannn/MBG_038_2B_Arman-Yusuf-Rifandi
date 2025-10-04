<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8">
                <a href="/" class="block transform hover:scale-105 transition-all duration-300">
                    <x-application-logo class="w-24 h-24 fill-current" style="color: #040348;" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 shadow-2xl overflow-hidden rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(4, 3, 72, 0.1);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
