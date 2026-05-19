<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier l\'entretien') }} — {{ $candidature->company_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('interviews.update', [$candidature, $interview]) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Type d\'entretien') }}</label>
                            <select id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Telephone" @selected(old('type', $interview->type) === 'Telephone')>{{ __('Téléphone') }}</option>
                                <option value="Technique" @selected(old('type', $interview->type) === 'Technique')>{{ __('Technique') }}</option>
                                <option value="RH" @selected(old('type', $interview->type) === 'RH')>{{ __('RH') }}</option>
                                <option value="Final" @selected(old('type', $interview->type) === 'Final')>{{ __('Final') }}</option>
                            </select>
                            @error('type')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="interview_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Date') }}</label>
                                <input id="interview_date" type="date" name="interview_date" value="{{ old('interview_date', $interview->interview_date->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('interview_date')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="interview_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Heure') }}</label>
                                <input id="interview_time" type="time" name="interview_time" value="{{ old('interview_time', $interview->interview_time ? \Carbon\Carbon::parse($interview->interview_time)->format('H:i') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('interview_time')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="preparation_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Notes de préparation') }}</label>
                            <textarea id="preparation_notes" name="preparation_notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('preparation_notes', $interview->preparation_notes) }}</textarea>
                            @error('preparation_notes')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="result" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Résultat') }}</label>
                            <select id="result" name="result" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="pending" @selected(old('result', $interview->result) === 'pending')>{{ __('En attente') }}</option>
                                <option value="positive" @selected(old('result', $interview->result) === 'positive')>{{ __('Positif') }}</option>
                                <option value="negative" @selected(old('result', $interview->result) === 'negative')>{{ __('Négatif') }}</option>
                            </select>
                            @error('result')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Mettre à jour') }}
                            </button>
                            <a href="{{ route('candidatures.show', $candidature) }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
