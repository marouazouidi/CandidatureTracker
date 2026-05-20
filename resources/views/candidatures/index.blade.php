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
                    <div>
                        <label class="block text-sm font-medium text-dark-500 mb-1">{{ __('Statut') }}</label>
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
                        <label class="block text-sm font-medium text-dark-500 mb-1">{{ __('Priorité') }}</label>
                        <select name="priority" class="input-field">
                            <option value="">{{ __('Toutes') }}</option>
                            <option value="low" @selected(request('priority') === 'low')>{{ __('Basse') }}</option>
                            <option value="medium" @selected(request('priority') === 'medium')>{{ __('Moyenne') }}</option>
                            <option value="high" @selected(request('priority') === 'high')>{{ __('Haute') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary text-xs">{{ __('Filtrer') }}</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @forelse($candidatures as $candidature)
                    <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-dark-100' : '' }}">
                        <div class="flex-1">
                            <div class="flex items-center gap-3">
                                <p class="text-sm font-semibold text-dark-600">{{ $candidature->company_name }}</p>
                                <x-status-badge :status="$candidature->status" />
                                <x-priority-badge :priority="$candidature->priority" />
                            </div>
                            <p class="text-sm text-dark-400 mt-0.5">{{ $candidature->poste_title }}</p>
                            <p class="text-xs text-dark-400 mt-0.5">{{ $candidature->date->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-rose-600 hover:text-rose-700 font-medium">{{ __('Voir') }}</a>
                            <a href="{{ route('candidatures.edit', $candidature) }}" class="text-sm text-dark-400 hover:text-dark-600">{{ __('Modifier') }}</a>
                            <form action="{{ route('candidatures.archive', $candidature) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:text-red-700" onclick="return confirm('{{ __('Archiver cette candidature ?') }}')">{{ __('Archiver') }}</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-dark-400">{{ __('Aucune candidature pour le moment.') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('candidatures.create') }}" class="btn-primary text-xs">{{ __('Ajouter une candidature') }}</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
