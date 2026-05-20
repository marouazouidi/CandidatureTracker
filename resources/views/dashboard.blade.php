<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-dark-400">{{ __('Candidatures actives') }}</p>
                            <p class="text-3xl font-bold text-dark-600 mt-1">{{ $activeCount }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-dark-400">{{ __('Entretiens à venir') }}</p>
                            <p class="text-3xl font-bold text-dark-600 mt-1">{{ $upcomingInterviews }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-dark-400">{{ __('Offres reçues') }}</p>
                            <p class="text-3xl font-bold text-dark-600 mt-1">{{ $offersReceived }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="text-base font-semibold text-dark-600">{{ __('Dernières candidatures') }}</h3>
            </div>
            <div class="card-body">
                @forelse($recentCandidatures as $candidature)
                    <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-dark-100' : '' }}">
                        <div>
                            <p class="text-sm font-medium text-dark-600">{{ $candidature->company_name }}</p>
                            <p class="text-xs text-dark-400">{{ $candidature->poste_title }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <x-status-badge :status="$candidature->status" />
                            <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-rose-600 hover:text-rose-700 font-medium">{{ __('Voir') }}</a>
                        </div>
                    </div>
                    @if($loop->last)
                        <div class="mt-4 pt-4 border-t border-dark-100">
                            <a href="{{ route('candidatures.index') }}" class="text-sm text-rose-600 hover:text-rose-700 font-medium">{{ __('Voir toutes les candidatures') }} &rarr;</a>
                        </div>
                    @endif
                @empty
                    <p class="text-sm text-dark-400">{{ __('Bienvenue ! Commencez par ajouter votre première candidature.') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('candidatures.create') }}" class="btn-primary text-xs">{{ __('Ajouter une candidature') }}</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
