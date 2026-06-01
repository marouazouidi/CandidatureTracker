<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-xl font-bold text-text-primary">{{ __('Welcome back') }}</h2>
        <p class="text-sm text-text-secondary mt-1">{{ __('Sign in to your account') }}</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-border text-primary shadow-sm focus:ring-primary" name="remember">
                <span class="ms-2 text-sm text-text-secondary">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-primary hover:text-primary-hover font-medium" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <p class="mt-6 text-center text-sm text-text-secondary">
            {{ __('No account?') }}
            <a href="{{ route('register') }}" class="text-primary hover:text-primary-hover font-medium">{{ __('Register') }}</a>
        </p>
    </form>
</x-guest-layout>
