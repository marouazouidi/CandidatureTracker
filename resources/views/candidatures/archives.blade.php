<x-app-layout>
    <x-slot name="header">{{ __('Candidatures archivées') }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('candidatures.index') }}" class="btn-secondary text-xs">{{ __('Candidatures actives') }}</a>
    </x-slot>

    <div class="space-y-6">
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-4 items-end">
                    @csrf
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-text-secondary mb-1">{{ __('Rechercher') }}</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Nom entreprise ou poste...') }}" class="input-field">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-secondary mb-1">{{ __('Statut') }}</label>
                        <select name="status" class="input-field">
                            <option value="">{{ __('Tous') }}</option>
                            <option value="to_review" @selected(request('status') === 'to_review')>{{ __('À réviser') }}</option>
                            <option value="interview_scheduled" @selected(request('status') === 'interview_scheduled')>{{ __('Entretien planifié') }}</option>
                            <option value="offer_received" @selected(request('status') === 'offer_received')>{{ __('Offre reçue') }}</option>
                            <option value="rejected" @selected(request('status') === 'rejected')>{{ __('Refusée') }}</option>
                            <option value="abandoned" @selected(request('status') === 'abandoned')>{{ __('Abandonnée') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary text-xs">{{ __('Filtrer') }}</button>
                    @if(request()->anyFilled(['search', 'status']))
                        <a href="{{ route('candidatures.archives') }}" class="btn-secondary text-xs">{{ __('Réinitialiser') }}</a>
                    @endif
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                @forelse($candidatures as $candidature)
                    <div class="flex items-center justify-between px-6 py-4 {{ !$loop->first ? 'border-t border-border' : '' }} hover:bg-gray-50/50 transition-colors">
                        <div class="flex items-center gap-4 flex-1 min-w-0">
                            <div class="w-10 h-10 rounded-xl bg-warning/30 flex items-center justify-center text-sm font-bold text-warning-text shrink-0">
                                {{ substr($candidature->company_name, 0, 1) }}
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-text-primary truncate">{{ $candidature->company_name }}</p>
                                <p class="text-xs text-text-secondary truncate">{{ $candidature->poste_title }}</p>
                                <p class="text-xs text-text-secondary mt-0.5">{{ __('Archivée le') }} {{ $candidature->deleted_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center gap-3 mx-4">
                            <x-status-badge :status="$candidature->status" />
                            <x-priority-badge :priority="$candidature->priority" />
                        </div>
                        <div class="flex items-center gap-3 shrink-0">
                            <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-primary hover:text-primary-hover font-medium">{{ __('Voir') }}</a>
                            <form action="{{ route('candidatures.restore', $candidature) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-sm text-success-text hover:text-success-text/80 font-medium">{{ __('Restaurer') }}</button>
                            </form>
                            <form action="{{ route('candidatures.forceDelete', $candidature) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-danger-text hover:text-danger-text/80" onclick="return confirm('{{ __('Supprimer définitivement ?') }}')">{{ __('Supprimer') }}</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center">
                        <p class="text-sm text-text-secondary">{{ __('Aucune candidature archivée.') }}</p>
                    </div>
                @endforelse
            </div>
            @if($candidatures->hasPages())
                <div class="px-6 py-4 border-t border-border">
                    {{ $candidatures->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
