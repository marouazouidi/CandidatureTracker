<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier la candidature') }} — {{ $candidature->company_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('candidatures.update', $candidature) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Entreprise') }}</label>
                            <input id="company_name" type="text" name="company_name" value="{{ old('company_name', $candidature->company_name) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('company_name')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="poste_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Poste') }}</label>
                            <input id="poste_title" type="text" name="poste_title" value="{{ old('poste_title', $candidature->poste_title) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('poste_title')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="poste_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('URL de l\'offre') }}</label>
                            <input id="poste_url" type="url" name="poste_url" value="{{ old('poste_url', $candidature->poste_url) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('poste_url')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Statut') }}</label>
                                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="to_review" @selected(old('status', $candidature->status) === 'to_review')>{{ __('À réviser') }}</option>
                                    <option value="interview_scheduled" @selected(old('status', $candidature->status) === 'interview_scheduled')>{{ __('Entretien planifié') }}</option>
                                    <option value="offer_received" @selected(old('status', $candidature->status) === 'offer_received')>{{ __('Offre reçue') }}</option>
                                    <option value="rejected" @selected(old('status', $candidature->status) === 'rejected')>{{ __('Refusée') }}</option>
                                    <option value="abandoned" @selected(old('status', $candidature->status) === 'abandoned')>{{ __('Abandonnée') }}</option>
                                </select>
                                @error('status')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Priorité') }}</label>
                                <select id="priority" name="priority" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="low" @selected(old('priority', $candidature->priority) === 'low')>{{ __('Basse') }}</option>
                                    <option value="medium" @selected(old('priority', $candidature->priority) === 'medium')>{{ __('Moyenne') }}</option>
                                    <option value="high" @selected(old('priority', $candidature->priority) === 'high')>{{ __('Haute') }}</option>
                                </select>
                                @error('priority')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Date de candidature') }}</label>
                                <input id="date" type="date" name="date" value="{{ old('date', $candidature->date->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('date')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Notes') }}</label>
                            <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $candidature->notes) }}</textarea>
                            @error('notes')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Mettre à jour') }}
                            </button>
                            <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">{{ __('Annuler') }}</a>
                        </div>
                    </form>

                    <form action="{{ route('candidatures.forceDelete', $candidature) }}" method="POST" class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300" onclick="return confirm('{{ __('Supprimer définitivement ? Cette action est irréversible.') }}')">
                            {{ __('Supprimer définitivement') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
