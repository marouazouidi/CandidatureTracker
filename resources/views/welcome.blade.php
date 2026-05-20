<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'CandidatureTracker') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-cream text-dark-600 min-h-screen flex flex-col">
        <header class="w-full px-6 py-5">
            <div class="max-w-6xl mx-auto flex items-center justify-between">
                <a href="/" class="flex items-center gap-2.5">
                    <span class="text-lg font-bold text-dark-600 tracking-tight">Tracker</span>
                </a>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-primary text-xs">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-dark-400 hover:text-dark-600 transition-colors">Log in</a>
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
                <div class="w-16 h-16 rounded-2xl bg-rose-100 flex items-center justify-center mx-auto mb-8">
                    <svg class="w-8 h-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold text-dark-600 tracking-tight leading-tight">
                    Suivez vos candidatures<br>
                    <span class="text-rose-600">en un coup d'œil</span>
                </h1>
                <p class="mt-5 text-lg text-dark-400 leading-relaxed max-w-lg mx-auto">
                    Organisez, suivez et gérez toutes vos recherches d'emploi au même endroit.
                </p>
                @if (Route::has('register'))
                    <div class="mt-10">
                        <a href="{{ route('register') }}" class="btn-primary text-base px-8 py-3">Commencer</a>
                    </div>
                @endif
            </div>
        </main>

        <footer class="py-6 text-center text-sm text-dark-400">
            &copy; {{ date('Y') }} Tracker. Tous droits réservés.
        </footer>
    </body>
</html>
