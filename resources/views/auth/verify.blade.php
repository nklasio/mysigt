@extends('layouts.auth')

@section('header')
    {{ __('Verify Your Email Address') }}
@endsection

@section('form')

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif
    <div class="text-gray-800">
        <span>
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </span>

    </div>

    <form class="d-inline mt-6" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <span class="text-gray-700">
            {{ __("Can't find your verification link?") }}
        </span>
        <div class="flex items-center justify-between mt-2">
            <button
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                {{ __('Resend Verification Link') }}
            </button>

        </div>
    </form>

@endsection
