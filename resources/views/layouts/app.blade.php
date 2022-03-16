<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'mysigt') }} | @yield('title')</title>
    <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
    @livewireStyles

</head>

<body class="antialiased bg-gray-300">
<div id="app" class="flex flex-col justify-between w-full min-h-screen">
    <div x-data="{open: false}">
        <nav class="p-6 py-2 bg-white lg:py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}"><span
                                        class="text-xl font-semibold tracking-tight">mysigt</span></a>
                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline ml-10">
                                <a href="#"
                                   class="block mt-4 mr-4 text-gray-600 lg:inline-block lg:mt-0 hover:text-gray-400">
                                    Features
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">
                            <div>
                                <a href="#"
                                   class="inline-block px-4 py-2 mt-4 text-sm font-semibold leading-none text-gray-600 hover:text-gray-400 lg:mt-0">FAQ</a>
                                <span class="-ml-2 text-gray-600">|</span>
                            </div>
                            <x-user-dropdown-component></x-user-dropdown-component>

                            @guest
                                <a href="{{ route('login') }}"
                                   class="inline-block px-4 py-2 mt-4 font-semibold leading-none text-gray-700 text-md hover:text-gray-800 lg:mt-0">Login</a>
                                <a href="{{ route('register') }}"
                                   class="inline-block px-4 py-2 mt-4 font-semibold leading-none text-gray-700 text-md hover:text-gray-800 lg:mt-0">Sign
                                    Up</a>
                            @endguest

                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <button x-on:click="open = !open"
                                class="inline-flex items-center justify-center p-2 text-indigo-400 rounded-md focus:outline-none">
                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path x-show="!open" class="inline-flex" stroke-linecap="round"
                                      stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                <path x-show="open" class="inline-flex" stroke-linecap="round"
                                      stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="open" class="block md:hidden">
                <div class="px-2 sm:px-3">
                    <a href="#"
                       class="block px-3 py-2 mt-1 text-base font-medium text-gray-500 rounded-md hover:text-gray-700">
                        Features
                    </a>

                </div>
                <div class="pt-4 pb-3 border-t border-indigo-300">
                    <a href="#"
                       class="block px-3 py-2 mt-1 text-base font-medium text-gray-500 rounded-md hover:text-gray-700">
                        FAQ
                    </a>
                </div>

                <div class="pt-4 pb-3 border-t border-indigo-300">
                    <div class="flex items-center px-5 sm:px-6">
                        @auth
                            <a href="#"
                               class="inline-block py-2 font-semibold leading-none text-gray-700 text-md hover:text-gray-600 ">{{ Auth::user()->name }}</a>
                        @endauth

                        @guest
                            <div class="flex-row">
                                <a href="{{ route('login') }}"
                                   class="block py-2 mt-4 mr-2 font-semibold leading-none text-gray-700 text-md hover:text-gray-800 hover:bg-gray-400 lg:mt-0">Login</a>
                                <a href="{{ route('register') }}"
                                   class="block py-2 mt-4 font-semibold leading-none text-gray-700 text-md hover:text-gray-800 hover:bg-gray-400 lg:mt-0">Sign
                                    Up</a>
                            </div>
                        @endguest
                    </div>
                    @auth
                        <div class="px-2 mt-3 sm:px-3">
                            <a href="{{ route('devices') }}"
                               class="block px-3 py-2 mt-1 text-base font-medium text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Devices</a>
                            <a href="{{ route('logout') }}"
                               class="block px-3 py-2 mt-1 text-base font-medium text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sign
                                out</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
    @auth
        @if (!auth()->user()->hasVerifiedEmail())
            @include('partials.banner.verify-email')
        @endif
    @endauth
    <main class=" mb-auto">
        @yield('content')
    </main>

    @include('partials.footer')

</div>
@livewireScripts

</body>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</html>
