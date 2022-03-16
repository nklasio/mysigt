@extends('layouts.app')

@section('title', 'home')

@section('content')
<div class="py-20" style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%)">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold mb-2 text-white">
            Just a remote APT wrapper...<br> <small>on steroids</small>
        </h2>
        <h3 class="text-2xl mb-8 text-gray-200">
            Manage your jailbroken Apple Device from everywhere!
        </h3>
        @guest
        <a href="{{route('register')}}" class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
            Sign up now!
        </a>
        @endguest
    </div>
</div>

@include('partials.features')
@endsection
