@extends('layouts.auth')

@section('header')
    {{ __('Register') }}
@endsection

@section('title', 'register')


@section('form')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-6">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

            <input id="name" type="text"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white  @error('name') border-red-500 @enderror"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">

            @error('name')
                <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white  @error('email') border-red-500 @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="john.doe@example.com">

            @error('email')
                <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

            <input id="password" type="password"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white  @error('password') border-red-500 @enderror"
                name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="********">

            @error('password')
                <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation"
                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>

            <input id="password_confirmation" type="password"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white  @error('password_confirmation') border-red-500 @enderror"
                name="password_confirmation" value="" required autocomplete="password_confirmation" placeholder="********">

            @error('password_confirmation')
                <p class="text-red-500 text-xs italic" role="alert">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <p class="text-gray-600">By registering you accept our <a class="text-gray-800" href="#">Terms and
                    Conditions</a></p>
        </div>

        <div class="flex items-center justify-between">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                {{ __('Register') }}
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
