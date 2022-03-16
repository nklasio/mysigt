@extends('layouts.auth')

@section('header')
    {{ __('Reset Password') }}
@endsection

@section('form')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-6">
            <label for="email"
                   class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email"
                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white  @error('email') border-red-500 @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                   placeholder="john.doe@example.com">

            @error('email')
            <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                {{ __('Reset Password') }}
            </button>
            @if (Route::has('login'))
                <a class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-800"
                   href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            @endif
        </div>
    </form>
@endsection
