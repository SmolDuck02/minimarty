<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <nav class="bg-white border-b border-gray-200 px-4 py-3 flex justify-between">
                <div class="flex space-x-4">
                    <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    Dashboard
                    </a>

                    <a href="{{ route('goods.index') }}"
                    class="{{ request()->routeIs('goods.index') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    Marketplace
                    </a>

                    <a href="{{ route('goods.create') }}"
                    class="{{ request()->routeIs('goods.create') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    Sell Something
                    </a>
                </div>

                <div>
                    <a href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.edit') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    Profile
                    </a>
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
