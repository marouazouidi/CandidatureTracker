<x-app-layout>
    <x-slot name="header">{{ __('Entretiens') }} — {{ $candidature->company_name }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
    </x-slot>

    <div class="card">
        <div class="card-body">
            @forelse($interviews as $interview)
                                    <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-border' : '' }}">
                    <div>
                        <p class="text-sm font-medium text-text-primary">{{ $interview->type }}</p>
                        <p class="text-xs text-text-secondary mt-0.5">{{ $interview->interview_date->format('d/m/Y') }}{{ $interview->interview_time ? ' à ' . \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '' }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        @if($interview->result === 'positive')
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-success text-success-text">{{ __('Positif') }}</span>
                        @elseif($interview->result === 'negative')
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-danger text-danger-text">{{ __('Négatif') }}</span>
                        @else
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-gray-200 text-text-secondary">{{ __('En attente') }}</span>
                        @endif
                        <a href="{{ route('interviews.show', [$candidature, $interview]) }}" class="text-xs text-primary hover:text-primary-hover font-medium">{{ __('Voir') }}</a>
                        <a href="{{ route('interviews.edit', [$candidature, $interview]) }}" class="text-xs text-text-secondary hover:text-text-primary">{{ __('Modifier') }}</a>
                        <form action="{{ route('interviews.destroy', [$candidature, $interview]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-danger-text hover:text-danger-text/80" onclick="return confirm('{{ __('Supprimer cet entretien ?') }}')">{{ __('Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-sm text-text-secondary">{{ __('Aucun entretien planifié.') }}</p>
                <div class="mt-4">
                    <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
