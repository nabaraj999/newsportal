<x-guest-layout>
    <div class="space-y-6">
        <div class="text-center">
            <p class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-slate-700">
                Admin Access
            </p>
            <h2 class="mt-4 text-3xl font-extrabold text-slate-900">Welcome Back</h2>
            <p class="mt-2 text-sm text-slate-600">
                Sign in to manage articles, categories, and website settings.
            </p>
        </div>

        <x-auth-session-status class="rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700" :status="session('status')" />

        <form class="space-y-5" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Admin Email')" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="email"
                    class="mt-1 block w-full rounded-xl border-slate-300 focus:border-slate-500 focus:ring-slate-500"
                    placeholder="admin@example.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    class="mt-1 block w-full rounded-xl border-slate-300 focus:border-slate-500 focus:ring-slate-500"
                    placeholder="Enter your password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center text-sm text-slate-700">
                    <input id="remember_me" name="remember" type="checkbox" class="rounded border-slate-300 text-slate-800 shadow-sm focus:ring-slate-500">
                    <span class="ml-2">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-slate-700 hover:text-slate-900">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <button type="submit"
                class="w-full rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold uppercase tracking-wide text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                Sign In to Admin Panel
            </button>
        </form>

        <p class="text-center text-xs text-slate-500">
            Need to check published content?
            <a href="{{ route('home') }}" class="font-semibold text-slate-700 hover:text-slate-900">Go to homepage</a>
        </p>
    </div>
</x-guest-layout>
