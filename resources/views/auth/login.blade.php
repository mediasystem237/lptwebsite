<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-900">Connexion</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
            <x-text-input id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="relative">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
            <x-text-input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a3 3 0 00-6 0m6 0a3 3 0 00-6 0m6 0a3 3 0 00-6 0M12 12a3 3 0 00-6 0m6 0a3 3 0 00-6 0M12 12a3 3 0 00-6 0" /></svg>
            </button>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.setAttribute('d', 'M12 12a3 3 0 00-6 0m6 0a3 3 0 00-6 0');
            } else {
                passwordField.type = 'password';
                eyeIcon.setAttribute('d', 'M15 12h.01M9 12h.01M15 12a3 3 0 01-6 0m6 0a3 3 0 00-6 0');
            }
        }
    </script>
</x-guest-layout>
