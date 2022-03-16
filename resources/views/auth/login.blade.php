@extends('layouts.auth')

@section('header')
    {{__('Login')}}
@endsection

@section('title', 'login')


@section('form')
    <form method="POST" action="{{ route('login') }}">
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
        <div class="mb-6">
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


        <div class="items-center mb-6">
            <div class="md:w-1/3"></div>
            <label class="md:w-2/3 block text-gray-500 font-bold">
                <input class="mr-2 leading-tight" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-sm">
                    {{ __('Remember Me') }}
                </span>
            </label>
        </div>


        <div class="flex items-center justify-between">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                {{ __('Login') }}
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
