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
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider">{{ __('Entreprise') }}</dt>
                        <dd class="mt-1 text-sm font-medium text-dark-600">{{ $candidature->company_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider">{{ __('Poste') }}</dt>
                        <dd class="mt-1 text-sm font-medium text-dark-600">{{ $candidature->poste_title }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider">{{ __('Statut') }}</dt>
                        <dd class="mt-1"><x-status-badge :status="$candidature->status" /></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider">{{ __('Priorité') }}</dt>
                        <dd class="mt-1"><x-priority-badge :priority="$candidature->priority" /></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider">{{ __('Date') }}</dt>
                        <dd class="mt-1 text-sm text-dark-600">{{ $candidature->date->format('d/m/Y') }}</dd>
                    </div>
                    @if($candidature->poste_url)
                    <div>
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider">{{ __('URL') }}</dt>
                        <dd class="mt-1 text-sm"><a href="{{ $candidature->poste_url }}" target="_blank" class="text-rose-600 hover:text-rose-700 font-medium">{{ __('Voir l\'offre') }}</a></dd>
                    </div>
                    @endif
                </dl>
                @if($candidature->notes)
                    <div class="mt-5 pt-5 border-t border-dark-100">
                        <dt class="text-xs font-medium text-dark-400 uppercase tracking-wider mb-2">{{ __('Notes') }}</dt>
                        <dd class="text-sm text-dark-600 whitespace-pre-wrap">{{ $candidature->notes }}</dd>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header flex items-center justify-between">
                <h3 class="text-sm font-semibold text-dark-600">{{ __('Entretiens') }}</h3>
                <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
            </div>
            <div class="card-body">
                @forelse($candidature->interviews as $interview)
                    <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-dark-100' : '' }}">
                        <div>
                            <p class="text-sm font-medium text-dark-600">{{ $interview->type }}</p>
                            <p class="text-xs text-dark-400 mt-0.5">{{ $interview->interview_date->format('d/m/Y') }}{{ $interview->interview_time ? ' à ' . \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '' }}</p>
                            @if($interview->preparation_notes)
                                <p class="text-xs text-dark-400 mt-0.5 line-clamp-1">{{ $interview->preparation_notes }}</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-3">
                            @if($interview->result === 'positive')
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ __('Positif') }}</span>
                            @elseif($interview->result === 'negative')
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ __('Négatif') }}</span>
                            @else
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">{{ __('En attente') }}</span>
                            @endif
                            <a href="{{ route('interviews.edit', [$candidature, $interview]) }}" class="text-xs text-dark-400 hover:text-dark-600">{{ __('Modifier') }}</a>
                            <form action="{{ route('interviews.destroy', [$candidature, $interview]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-500 hover:text-red-700" onclick="return confirm('{{ __('Supprimer cet entretien ?') }}')">{{ __('Supprimer') }}</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-dark-400">{{ __('Aucun entretien planifié.') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
