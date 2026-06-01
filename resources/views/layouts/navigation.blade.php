<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-sidebar shadow-xl transform lg:transform-none lg:translate-x-0 transition-transform duration-300 -translate-x-full flex flex-col">
    <div class="flex items-center justify-between h-16 px-6 border-b border-white/10 shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <span class="text-lg font-bold text-white tracking-tight">Tracker</span>
        </a>
        <button class="lg:hidden text-white/70 hover:text-white" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            {{ __('Dashboard') }}
        </x-nav-link>

        <x-nav-link :href="route('candidatures.index')" :active="request()->routeIs('candidatures.index') || request()->routeIs('candidatures.create') || request()->routeIs('candidatures.show') || request()->routeIs('candidatures.edit')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            {{ __('Candidatures') }}
        </x-nav-link>

        <x-nav-link :href="route('candidatures.archives')" :active="request()->routeIs('candidatures.archives')">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
            </svg>
            {{ __('Archives') }}
        </x-nav-link>
    </nav>

    <div class="shrink-0 border-t border-white/10 p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm text-white/70 hover:text-white hover:bg-white/10 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</aside>

<script>
    document.addEventListener('click', function(e) {
        var sidebar = document.getElementById('sidebar');
        var toggle = document.getElementById('sidebar-toggle');
        if (window.innerWidth < 1024 && sidebar.classList.contains('-translate-x-full') === false) {
            if (!sidebar.contains(e.target) && e.target !== toggle && !toggle?.contains(e.target)) {
                sidebar.classList.add('-translate-x-full');
            }
        }
    });
</script>
