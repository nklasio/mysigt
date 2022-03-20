<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'jaraw') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
    @livewireStyles

</head>
<body class="antialiased bg-gray-300">
<div id="app" class="flex flex-col w-full h-screen">
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
    <div class="flex flex-grow">
        <nav class="w-1/6 border-r-2 border-indigo-300 bg-indigo-50  p-5 ">
            <span class="font-semibold text-gray-700 p-4 text-lg">Dashboard</span>
            <div class="ml-4">
                <a href="{{route('dashboard.users')}}">
                    <div class="flex items-center p-2 rounded-lg hover:text-white hover:bg-indigo-600 {{ Route::currentRouteNamed('dashboard.users') ? 'bg-indigo-300 text-white' : '' }} ">
                        <span class="pr-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </span>
                        <span class="font-semibold ">Users</span>
                    </div>
                </a>
                <a href="{{route('dashboard.devices')}}">
                    <div class="flex items-center p-2 rounded-lg hover:text-white hover:bg-indigo-600 {{ Route::currentRouteNamed('dashboard.devices') ? 'bg-indigo-300 text-white' : '' }} ">
                        <span class="pr-2 ">
                             <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path fill="#4A5568"
                                      d="M9.228 3.684L8.279 4l.949-.316zm1.498 4.493l-.949.316.949-.316zm-.502 1.21l.447.895-.447-.894zm-2.257 1.13l-.447-.895a1 1 0 00-.465 1.306l.912-.412zm5.516 5.516l-.41.912a1 1 0 001.305-.465l-.895-.447zm1.13-2.257l-.895-.447.894.447zm1.21-.502l-.316.949.316-.949zm4.493 1.498l.317-.949-.317.95zM5 2a3 3 0 00-3 3h2a1 1 0 011-1V2zm3.28 0H5v2h3.28V2zm1.897 1.368A2 2 0 008.279 2v2l1.898-.632zm1.497 4.493l-1.497-4.493L8.279 4l1.498 4.493 1.897-.632zm-1.002 2.421a2 2 0 001.002-2.421l-1.897.632.895 1.79zm-2.258 1.129l2.258-1.129-.895-1.789-2.257 1.13.894 1.788zm5.48 3.71a10.042 10.042 0 01-5.015-5.016l-1.824.822a12.042 12.042 0 006.018 6.018l.822-1.824zm-.176-1.793l-1.129 2.258 1.789.894 1.129-2.257-1.79-.895zm2.421-1.002a2 2 0 00-2.421 1.002l1.789.895.632-1.897zm4.494 1.497l-4.494-1.497-.632 1.897L20 15.72l.633-1.898zM22 15.721a2 2 0 00-1.367-1.898L20 15.721h2zM22 19v-3.28h-2V19h2zm-3 3a3 3 0 003-3h-2a1 1 0 01-1 1v2zm-1 0h1v-2h-1v2zM2 6c0 8.837 7.163 16 16 16v-2C10.268 20 4 13.732 4 6H2zm0-1v1h2V5H2z"/>
                            </svg>
                        </span>
                        <span class="font-semibold ">Devices</span>
                    </div>
                </a>
            </div>
        </nav>
        <main class="flex-grow">
            @yield('content')
        </main>
    </div>
    @include('partials.footer')

</div>
@livewireScripts
@yield('scripts')
</html>
