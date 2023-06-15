@extends('layouts.site')
@section('style')
    style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;"
@endsection
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h3>Login</h3>
        <input class="form-control" type="email" required name="email" placeholder="Email" value="{{ old('email') }}" />
        @error('email')
            <div class="alert alert-danger mb-0 mt-2">
                {{ $message }}
            </div>
        @enderror
        <input class="form-control mt-2" type="password" name="password" placeholder="password" />
        @error('password')
            <div class="alert alert-danger mb-0 mt-2">
                {{ $message }}
            </div>
        @enderror
        <div class="text-center">
            <button class="btn btn-primary w-100 my-2" type="submit">Login</button>

            <br>
            <a class="text-decoration-none" href="{{ route('register') }}">
                You don't have accound! sign up
            </a>
        </div>
    </form>
@endsection

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
