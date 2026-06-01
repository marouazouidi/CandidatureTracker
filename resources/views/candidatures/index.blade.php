<x-app-layout>
    <x-slot name="header">{{ __('Mes candidatures') }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('candidatures.create') }}" class="btn-primary text-xs">{{ __('Nouvelle candidature') }}</a>
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
                    <div>
                        <label class="block text-sm font-medium text-text-secondary mb-1">{{ __('Priorité') }}</label>
                        <select name="priority" class="input-field">
                            <option value="">{{ __('Toutes') }}</option>
                            <option value="low" @selected(request('priority') === 'low')>{{ __('Basse') }}</option>
                            <option value="medium" @selected(request('priority') === 'medium')>{{ __('Moyenne') }}</option>
                            <option value="high" @selected(request('priority') === 'high')>{{ __('Haute') }}</option>
                        </select>
                    </div>
                    <input type="hidden" name="sort" value="{{ request('sort', 'created_at') }}">
                    <input type="hidden" name="direction" value="{{ request('direction', 'desc') }}">
                    <button type="submit" class="btn-primary text-xs">{{ __('Filtrer') }}</button>
                    @if(request()->anyFilled(['search', 'status', 'priority']))
                        <a href="{{ route('candidatures.index') }}" class="btn-secondary text-xs">{{ __('Réinitialiser') }}</a>
                    @endif
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                @forelse($candidatures as $candidature)
                    <div class="flex items-center justify-between px-6 py-4 {{ !$loop->first ? 'border-t border-border' : '' }} hover:bg-gray-50/50 transition-colors">
                        <div class="flex items-center gap-4 flex-1 min-w-0">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-sm font-bold text-primary shrink-0">
                                {{ substr($candidature->company_name, 0, 1) }}
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-text-primary truncate">{{ $candidature->company_name }}</p>
                                <p class="text-xs text-text-secondary truncate">{{ $candidature->poste_title }}</p>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center gap-3 mx-4">
                            <x-status-badge :status="$candidature->status" />
                            <x-priority-badge :priority="$candidature->priority" />
                        </div>
                        <div class="hidden sm:block text-xs text-text-secondary whitespace-nowrap mx-4">
                            {{ $candidature->date->format('d/m/Y') }}
                        </div>
                        <div class="flex items-center gap-3 shrink-0">
                            <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-primary hover:text-primary-hover font-medium">{{ __('Voir') }}</a>
                            <a href="{{ route('candidatures.edit', $candidature) }}" class="text-sm text-text-secondary hover:text-text-primary">{{ __('Modifier') }}</a>
                            <form action="{{ route('candidatures.archive', $candidature) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-danger-text hover:text-danger-text/80" onclick="return confirm('{{ __('Archiver cette candidature ?') }}')">{{ __('Archiver') }}</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center">
                        <p class="text-sm text-text-secondary">{{ __('Aucune candidature pour le moment.') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('candidatures.create') }}" class="btn-primary text-xs">{{ __('Ajouter une candidature') }}</a>
                        </div>
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
