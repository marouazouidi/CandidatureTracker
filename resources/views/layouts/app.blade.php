<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CandidatureTracker') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex">
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col lg:ml-64" id="main-content">
                @isset($header)
                    <header class="bg-white border-b border-dark-100/50 px-8 py-4">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-semibold text-dark-600">{{ $header }}</h1>
                            <div class="flex items-center gap-2">
                                @isset($actions)
                                    {!! $actions !!}
                                @endisset
                                <button id="sidebar-toggle" class="lg:hidden p-2 text-dark-500 hover:text-dark-600 rounded-lg hover:bg-dark-50 transition-colors" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </header>
                @endisset

                <main class="flex-1 p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
