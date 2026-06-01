<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'CandidatureTracker') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-bg text-text-primary min-h-screen flex flex-col">
        <header class="w-full px-6 py-5">
            <div class="max-w-6xl mx-auto flex items-center justify-between">
                <a href="/" class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-primary flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-text-primary tracking-tight">Tracker</span>
                </a>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-primary text-xs">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-text-secondary hover:text-text-primary transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-primary text-xs">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <main class="flex-1 flex items-center justify-center px-6 py-16">
            <div class="max-w-2xl mx-auto text-center">
                <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-8">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold text-text-primary tracking-tight leading-tight">
                    Suivez vos candidatures<br>
                    <span class="text-primary">en un coup d'œil</span>
                </h1>
                <p class="mt-5 text-lg text-text-secondary leading-relaxed max-w-lg mx-auto">
                    Organisez, suivez et gérez toutes vos recherches d'emploi au même endroit.
                </p>
                @if (Route::has('register'))
                    <div class="mt-10">
                        <a href="{{ route('register') }}" class="btn-primary text-base px-8 py-3">Commencer</a>
                    </div>
                @endif
            </div>
        </main>

        <footer class="py-6 text-center text-sm text-text-secondary">
            &copy; {{ date('Y') }} Tracker. Tous droits réservés.
        </footer>
    </body>
</html>
