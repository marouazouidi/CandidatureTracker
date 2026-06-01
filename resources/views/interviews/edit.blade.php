<x-app-layout>
    <x-slot name="header">{{ __('Modifier l\'entretien') }} — {{ $candidature->company_name }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('candidatures.show', $candidature) }}" class="btn-secondary text-xs">{{ __('Retour') }}</a>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('interviews.update', [$candidature, $interview]) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="type" :value="__('Type')" />
                        <select id="type" name="type" class="input-field mt-1">
                            <option value="Telephone" @selected(old('type', $interview->type) === 'Telephone')>{{ __('Téléphone') }}</option>
                            <option value="Technique" @selected(old('type', $interview->type) === 'Technique')>{{ __('Technique') }}</option>
                            <option value="RH" @selected(old('type', $interview->type) === 'RH')>{{ __('RH') }}</option>
                            <option value="Final" @selected(old('type', $interview->type) === 'Final')>{{ __('Final') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="interview_date" :value="__('Date')" />
                            <x-text-input id="interview_date" type="date" name="interview_date" :value="old('interview_date', $interview->interview_date->format('Y-m-d'))" class="mt-1 w-full" required />
                            <x-input-error :messages="$errors->get('interview_date')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="interview_time" :value="__('Heure')" />
                            <x-text-input id="interview_time" type="time" name="interview_time" :value="old('interview_time', $interview->interview_time ? \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '')" class="mt-1 w-full" />
                            <x-input-error :messages="$errors->get('interview_time')" class="mt-1" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="preparation_notes" :value="__('Notes de préparation')" />
                        <textarea id="preparation_notes" name="preparation_notes" rows="4" class="input-field mt-1">{{ old('preparation_notes', $interview->preparation_notes) }}</textarea>
                        <x-input-error :messages="$errors->get('preparation_notes')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="result" :value="__('Résultat')" />
                        <select id="result" name="result" class="input-field mt-1">
                            <option value="pending" @selected(old('result', $interview->result) === 'pending')>{{ __('En attente') }}</option>
                            <option value="positive" @selected(old('result', $interview->result) === 'positive')>{{ __('Positif') }}</option>
                            <option value="negative" @selected(old('result', $interview->result) === 'negative')>{{ __('Négatif') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('result')" class="mt-1" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Mettre à jour') }}</x-primary-button>
                        <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-text-secondary hover:text-text-primary">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
