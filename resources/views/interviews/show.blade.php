<x-app-layout>
    <x-slot name="header">{{ $interview->type }} — {{ $candidature->company_name }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('interviews.edit', [$candidature, $interview]) }}" class="btn-secondary text-xs">{{ __('Modifier') }}</a>
        <a href="{{ route('candidatures.show', $candidature) }}" class="btn-primary text-xs">{{ __('Retour') }}</a>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Type') }}</dt>
                    <dd class="mt-1 text-sm font-medium text-text-primary">{{ $interview->type }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Date') }}</dt>
                    <dd class="mt-1 text-sm text-text-primary">{{ $interview->interview_date->format('d/m/Y') }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Heure') }}</dt>
                    <dd class="mt-1 text-sm text-text-primary">{{ $interview->interview_time ? \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider">{{ __('Résultat') }}</dt>
                    <dd class="mt-1">
                        @if($interview->result === 'positive')
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-success text-success-text">{{ __('Positif') }}</span>
                        @elseif($interview->result === 'negative')
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-danger text-danger-text">{{ __('Négatif') }}</span>
                        @else
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-gray-200 text-text-secondary">{{ __('En attente') }}</span>
                        @endif
                    </dd>
                </div>
            </dl>
            @if($interview->preparation_notes)
                <div class="mt-5 pt-5 border-t border-border">
                    <dt class="text-xs font-medium text-text-secondary uppercase tracking-wider mb-2">{{ __('Notes de préparation') }}</dt>
                    <dd class="text-sm text-text-primary whitespace-pre-wrap">{{ $interview->preparation_notes }}</dd>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
