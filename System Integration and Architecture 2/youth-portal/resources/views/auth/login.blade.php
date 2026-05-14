<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-teal-700 uppercase tracking-tight">Youth Portal</h2>
        <p class="text-xs text-gray-500 font-bold">Access the Management & Statistics System</p>
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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-teal-600 shadow-sm focus:ring-teal-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col space-y-4 mt-6">
            <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-xs text-gray-500 hover:text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif

                <a class="text-sm font-bold text-teal-600 hover:text-teal-800 transition duration-150 underline" href="{{ route('register') }}">
                    {{ __("No account? Register here") }}
                </a>
            </div>

            <div class="flex justify-end">
                <x-primary-button class="ms-3 bg-teal-600 hover:bg-teal-700">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>