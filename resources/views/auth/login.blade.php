<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md mt-10">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar Sesión</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            <!-- Submit -->
            <x-primary-button class="w-full justify-center">
                Iniciar sesión
            </x-primary-button>
        </form>
    </div>
    <div class="text-center mt-4">
    <p class="text-sm text-gray-600">
        ¿No tenés cuenta?
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Registrate acá</a>
    </p>
</div>
</x-guest-layout>
