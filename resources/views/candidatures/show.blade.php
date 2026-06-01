<x-app-layout>
    <x-slot name="header">{{ $candidature->company_name }} — {{ $candidature->poste_title }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('candidatures.edit', $candidature) }}" class="btn-secondary text-xs">{{ __('Modifier') }}</a>
        <a href="{{ route('candidatures.index') }}" class="btn-primary text-xs">{{ __('Retour') }}</a>
    </x-slot>

    <div class="space-y-6">
        <div class="card">
            <div class="card-body">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Entreprise') }}</dt>
                        <dd class="mt-1 text-sm font-medium text-text-primary">{{ $candidature->company_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Poste') }}</dt>
                        <dd class="mt-1 text-sm font-medium text-text-primary">{{ $candidature->poste_title }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Statut') }}</dt>
                        <dd class="mt-1"><x-status-badge :status="$candidature->status" /></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Priorité') }}</dt>
                        <dd class="mt-1"><x-priority-badge :priority="$candidature->priority" /></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Date') }}</dt>
                        <dd class="mt-1 text-sm text-text-primary">{{ $candidature->date->format('d/m/Y') }}</dd>
                    </div>
                    @if($candidature->poste_url)
                    <div>
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('URL') }}</dt>
                        <dd class="mt-1 text-sm"><a href="{{ $candidature->poste_url }}" target="_blank" class="text-primary hover:text-primary-hover font-medium">{{ __('Voir l\'offre') }}</a></dd>
                    </div>
                    @endif
                </dl>
                @if($candidature->notes)
                    <div class="mt-5 pt-5 border-t border-border">
                        <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider mb-2">{{ __('Notes') }}</dt>
                        <dd class="text-sm text-text-primary whitespace-pre-wrap">{{ $candidature->notes }}</dd>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header flex items-center justify-between">
                <h3 class="text-base font-semibold text-text-primary">{{ __('Entretiens') }}</h3>
                <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
            </div>
            <div class="card-body">
                @forelse($candidature->interviews as $interview)
                    <div class="flex gap-4 {{ !$loop->last ? 'pb-6' : '' }}">
                        <div class="flex flex-col items-center">
                            <div class="w-3 h-3 rounded-full {{ $interview->result === 'positive' ? 'bg-success-text' : ($interview->result === 'negative' ? 'bg-danger-text' : 'bg-info-text') }} ring-4 {{ $interview->result === 'positive' ? 'ring-success/30' : ($interview->result === 'negative' ? 'ring-danger/30' : 'ring-info/30') }} shrink-0"></div>
                            @if(!$loop->last)
                                <div class="w-0.5 flex-1 bg-border mt-1.5"></div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-semibold text-text-primary">{{ $interview->type }}</p>
                                    <p class="text-xs text-text-secondary mt-0.5">{{ $interview->interview_date->format('d/m/Y') }}{{ $interview->interview_time ? ' à ' . \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '' }}</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    @if($interview->result === 'positive')
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-success text-success-text">{{ __('Positif') }}</span>
                                    @elseif($interview->result === 'negative')
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-danger text-danger-text">{{ __('Négatif') }}</span>
                                    @else
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-200 text-text-secondary">{{ __('En attente') }}</span>
                                    @endif
                                    <a href="{{ route('interviews.edit', [$candidature, $interview]) }}" class="text-xs text-text-secondary hover:text-text-primary font-medium">{{ __('Modifier') }}</a>
                                    <form action="{{ route('interviews.destroy', [$candidature, $interview]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-danger-text hover:text-danger-text/80" onclick="return confirm('{{ __('Supprimer cet entretien ?') }}')">{{ __('Supprimer') }}</button>
                                    </form>
                                </div>
                            </div>
                            @if($interview->preparation_notes)
                                <p class="text-xs text-text-secondary mt-2 bg-gray-50 rounded-xl p-3 border border-border">{{ $interview->preparation_notes }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-text-secondary">{{ __('Aucun entretien planifié.') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
