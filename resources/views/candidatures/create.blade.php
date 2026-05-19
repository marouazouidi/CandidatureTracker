<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouvelle candidature') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('candidatures.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Entreprise') }}</label>
                            <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('company_name')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="poste_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Poste') }}</label>
                            <input id="poste_title" type="text" name="poste_title" value="{{ old('poste_title') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('poste_title')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="poste_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('URL de l\'offre') }}</label>
                            <input id="poste_url" type="url" name="poste_url" value="{{ old('poste_url') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('poste_url')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Statut') }}</label>
                                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="to_review" @selected(old('status', 'to_review') === 'to_review')>{{ __('À réviser') }}</option>
                                    <option value="interview_scheduled" @selected(old('status') === 'interview_scheduled')>{{ __('Entretien planifié') }}</option>
                                    <option value="offer_received" @selected(old('status') === 'offer_received')>{{ __('Offre reçue') }}</option>
                                    <option value="rejected" @selected(old('status') === 'rejected')>{{ __('Refusée') }}</option>
                                    <option value="abandoned" @selected(old('status') === 'abandoned')>{{ __('Abandonnée') }}</option>
                                </select>
                                @error('status')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Priorité') }}</label>
                                <select id="priority" name="priority" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="low" @selected(old('priority') === 'low')>{{ __('Basse') }}</option>
                                    <option value="medium" @selected(old('priority', 'medium') === 'medium')>{{ __('Moyenne') }}</option>
                                    <option value="high" @selected(old('priority') === 'high')>{{ __('Haute') }}</option>
                                </select>
                                @error('priority')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Date de candidature') }}</label>
                                <input id="date" type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('date')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Notes') }}</label>
                            <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes') }}</textarea>
                            @error('notes')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Enregistrer') }}
                            </button>
                            <a href="{{ route('candidatures.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
