<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="space-y-6">
        <p class="text-lg text-text-secondary">Welcome back, {{ Auth::user()->name }} 👋</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="card hover:shadow-md transition-shadow duration-200">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">{{ __('Candidatures actives') }}</p>
                            <p class="text-3xl font-bold text-text-primary mt-1">{{ $activeCount }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-md transition-shadow duration-200">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">{{ __('Entretiens à venir') }}</p>
                            <p class="text-3xl font-bold text-text-primary mt-1">{{ $upcomingInterviews }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-info flex items-center justify-center">
                            <svg class="w-6 h-6 text-info-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-md transition-shadow duration-200">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">{{ __('Offres reçues') }}</p>
                            <p class="text-3xl font-bold text-text-primary mt-1">{{ $offersReceived }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-success flex items-center justify-center">
                            <svg class="w-6 h-6 text-success-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-md transition-shadow duration-200">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">{{ __('Refusées') }}</p>
                            <p class="text-3xl font-bold text-text-primary mt-1">{{ $rejectedCount }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-danger flex items-center justify-center">
                            <svg class="w-6 h-6 text-danger-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-base font-semibold text-text-primary">{{ __('Dernières candidatures') }}</h3>
                </div>
                <div class="card-body">
                    @forelse($recentCandidatures as $candidature)
                        <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-border' : '' }}">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center text-sm font-bold text-primary shrink-0">
                                    {{ substr($candidature->company_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-text-primary">{{ $candidature->company_name }}</p>
                                    <p class="text-xs text-text-secondary">{{ $candidature->poste_title }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <x-status-badge :status="$candidature->status" />
                                <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-primary hover:text-primary-hover font-medium">{{ __('Voir') }}</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-text-secondary">{{ __('Bienvenue ! Commencez par ajouter votre première candidature.') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('candidatures.create') }}" class="btn-primary text-xs">{{ __('Ajouter une candidature') }}</a>
                        </div>
                    @endforelse
                    @if($recentCandidatures->isNotEmpty())
                        <div class="mt-4 pt-4 border-t border-border">
                            <a href="{{ route('candidatures.index') }}" class="text-sm text-primary hover:text-primary-hover font-medium">{{ __('Voir toutes les candidatures') }} &rarr;</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-base font-semibold text-text-primary">{{ __('Entretiens à venir') }}</h3>
                </div>
                <div class="card-body">
                    @forelse($upcomingInterviewsList as $interview)
                        <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-border' : '' }}">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-info/20 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-info-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-text-primary">{{ $interview->candidature->company_name }}</p>
                                    <p class="text-xs text-text-secondary">{{ $interview->type }} — {{ $interview->interview_date->format('d/m/Y') }}{{ $interview->interview_time ? ' à ' . \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '' }}</p>
                                </div>
                            </div>
                            <a href="{{ route('candidatures.show', $interview->candidature) }}" class="text-sm text-primary hover:text-primary-hover font-medium">{{ __('Voir') }}</a>
                        </div>
                    @empty
                        <p class="text-sm text-text-secondary">{{ __('Aucun entretien à venir.') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('candidatures.index') }}" class="text-sm text-primary hover:text-primary-hover font-medium">{{ __('Voir les candidatures') }} &rarr;</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="text-base font-semibold text-text-primary">{{ __('Actions rapides') }}</h3>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="{{ route('candidatures.create') }}" class="flex items-center gap-4 p-4 rounded-xl border border-border hover:border-primary/30 hover:bg-primary/5 transition-all duration-200 group">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-text-primary">{{ __('Nouvelle candidature') }}</p>
                            <p class="text-xs text-text-secondary">{{ __('Ajouter une offre') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('candidatures.index') }}" class="flex items-center gap-4 p-4 rounded-xl border border-border hover:border-primary/30 hover:bg-primary/5 transition-all duration-200 group">
                        <div class="w-12 h-12 rounded-xl bg-info/20 flex items-center justify-center group-hover:bg-info/30 transition-colors">
                            <svg class="w-6 h-6 text-info-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-text-primary">{{ __('Mes candidatures') }}</p>
                            <p class="text-xs text-text-secondary">{{ __('Voir la liste') }}</p>
                        </div>
                    </a>
                    <a href="{{ route('candidatures.archives') }}" class="flex items-center gap-4 p-4 rounded-xl border border-border hover:border-primary/30 hover:bg-primary/5 transition-all duration-200 group">
                        <div class="w-12 h-12 rounded-xl bg-warning/30 flex items-center justify-center group-hover:bg-warning/40 transition-colors">
                            <svg class="w-6 h-6 text-warning-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-text-primary">{{ __('Archives') }}</p>
                            <p class="text-xs text-text-secondary">{{ __('Voir les archivées') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
