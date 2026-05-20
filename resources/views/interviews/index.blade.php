<x-app-layout>
    <x-slot name="header">{{ __('Entretiens') }} — {{ $candidature->company_name }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
    </x-slot>

    <div class="card">
        <div class="card-body">
            @forelse($interviews as $interview)
                <div class="flex items-center justify-between py-3 {{ !$loop->first ? 'border-t border-dark-100' : '' }}">
                    <div>
                        <p class="text-sm font-medium text-dark-600">{{ $interview->type }}</p>
                        <p class="text-xs text-dark-400 mt-0.5">{{ $interview->interview_date->format('d/m/Y') }}{{ $interview->interview_time ? ' à ' . \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '' }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        @if($interview->result === 'positive')
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{ __('Positif') }}</span>
                        @elseif($interview->result === 'negative')
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ __('Négatif') }}</span>
                        @else
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">{{ __('En attente') }}</span>
                        @endif
                        <a href="{{ route('interviews.show', [$candidature, $interview]) }}" class="text-xs text-rose-600 hover:text-rose-700 font-medium">{{ __('Voir') }}</a>
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
                <div class="mt-4">
                    <a href="{{ route('interviews.create', $candidature) }}" class="btn-primary text-xs">{{ __('Ajouter un entretien') }}</a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
