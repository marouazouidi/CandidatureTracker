<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CandidatureTracker') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Top Navbar -->
        <nav class="fixed top-0 left-0 right-0 z-50 h-16 bg-white border-b border-border">
            <div class="flex items-center justify-between h-full px-4 lg:pl-72">
                <div class="flex items-center gap-3">
                    <button id="sidebar-toggle" class="lg:hidden p-2 text-text-secondary hover:text-text-primary rounded-lg hover:bg-gray-50 transition-colors" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center gap-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm font-medium">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-text-primary hidden md:block">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-text-secondary hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </nav>

        <div class="min-h-screen flex pt-16">
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col lg:ml-64" id="main-content">
                @isset($header)
                    <div class="flex items-center justify-between px-8 pt-4 pb-2">
                        <h1 class="text-xl font-semibold text-text-primary">{{ $header }}</h1>
                        <div class="flex items-center gap-2">
                            @isset($actions)
                                {!! $actions !!}
                            @endisset
                        </div>
                    </div>
                @endisset

                <main class="flex-1 p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
