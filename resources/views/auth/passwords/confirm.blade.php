@extends('layouts.auth')

@section('header')
    {{ __('Confirm Password') }}
@endsection

@section('form')

    {{ __('Please confirm your password to continue...') }}

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-6 mt-4">
            <label for="password"
                   class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

            <input id="password" type="password"
                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white  @error('password') border-red-500 @enderror"
                   name="password" required
                   autocomplete="current-password" placeholder="******************">

            @error('password')
            <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                {{ __('Confirm Password') }}
            </button>
            @if (Route::has('password.request'))
                <a class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-800"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
@endsection
