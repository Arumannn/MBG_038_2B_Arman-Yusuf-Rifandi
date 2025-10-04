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
    <body class="font-sans antialiased" style="background-color: #f1e9dc;">
        <div class="min-h-screen" style="background: linear-gradient(135deg, #f1e9dc 0%, #cbcdc4 100%);">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow-lg" style="background: linear-gradient(135deg, #040348 0%, #1a1a5e 100%); border-bottom: 3px solid #ffbb31;">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <div class="text-white">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pb-12">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
