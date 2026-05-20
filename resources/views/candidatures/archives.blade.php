<x-app-layout>
    <x-slot name="header">{{ __('Candidatures archivées') }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('candidatures.index') }}" class="btn-secondary text-xs">{{ __('Candidatures actives') }}</a>
    </x-slot>

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
                        <p class="text-xs text-dark-400 mt-0.5">{{ __('Archivée le') }} {{ $candidature->deleted_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-rose-600 hover:text-rose-700 font-medium">{{ __('Voir') }}</a>
                        <form action="{{ route('candidatures.restore', $candidature) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-sm text-green-600 hover:text-green-800 font-medium">{{ __('Restaurer') }}</button>
                        </form>
                        <form action="{{ route('candidatures.forceDelete', $candidature) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-500 hover:text-red-700" onclick="return confirm('{{ __('Supprimer définitivement ?') }}')">{{ __('Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-sm text-dark-400">{{ __('Aucune candidature archivée.') }}</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
