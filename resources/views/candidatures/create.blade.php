<x-app-layout>
    <x-slot name="header">{{ __('Nouvelle candidature') }}</x-slot>
    <x-slot name="actions">
        <a href="{{ route('candidatures.index') }}" class="btn-secondary text-xs">{{ __('Retour') }}</a>
    </x-slot>

    <div class="max-w-2xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('candidatures.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <x-input-label for="company_name" :value="__('Entreprise')" />
                        <x-text-input id="company_name" type="text" name="company_name" :value="old('company_name')" class="mt-1 w-full" required autofocus />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="poste_title" :value="__('Poste')" />
                        <x-text-input id="poste_title" type="text" name="poste_title" :value="old('poste_title')" class="mt-1 w-full" required />
                        <x-input-error :messages="$errors->get('poste_title')" class="mt-1" />
                    </div>

                    <div>
                        <x-input-label for="poste_url" :value="__('URL de l\'offre')" />
                        <x-text-input id="poste_url" type="url" name="poste_url" :value="old('poste_url')" class="mt-1 w-full" />
                        <x-input-error :messages="$errors->get('poste_url')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <x-input-label for="status" :value="__('Statut')" />
                            <select id="status" name="status" class="input-field mt-1">
                                <option value="to_review" @selected(old('status', 'to_review') === 'to_review')>{{ __('À réviser') }}</option>
                                <option value="interview_scheduled" @selected(old('status') === 'interview_scheduled')>{{ __('Entretien planifié') }}</option>
                                <option value="offer_received" @selected(old('status') === 'offer_received')>{{ __('Offre reçue') }}</option>
                                <option value="rejected" @selected(old('status') === 'rejected')>{{ __('Refusée') }}</option>
                                <option value="abandoned" @selected(old('status') === 'abandoned')>{{ __('Abandonnée') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="priority" :value="__('Priorité')" />
                            <select id="priority" name="priority" class="input-field mt-1">
                                <option value="low" @selected(old('priority') === 'low')>{{ __('Basse') }}</option>
                                <option value="medium" @selected(old('priority', 'medium') === 'medium')>{{ __('Moyenne') }}</option>
                                <option value="high" @selected(old('priority') === 'high')>{{ __('Haute') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('priority')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" type="date" name="date" :value="old('date', date('Y-m-d'))" class="mt-1 w-full" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-1" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="notes" :value="__('Notes')" />
                        <textarea id="notes" name="notes" rows="4" class="input-field mt-1">{{ old('notes') }}</textarea>
                        <x-input-error :messages="$errors->get('notes')" class="mt-1" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                        <a href="{{ route('candidatures.index') }}" class="text-sm text-dark-400 hover:text-dark-600">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
