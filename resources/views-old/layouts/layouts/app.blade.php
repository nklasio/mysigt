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

</head>

<body class="bg-gray-300 antialiased">
    <div id="app" class="w-full  min-h-screen flex flex-col">
        <navigation-component inline-template>
            <nav class="bg-white p-6 py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <a href="{{ route('home') }}"><span
                                        class="font-semibold text-xl tracking-tight">jaraw</span></a>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline">
                                    <a href="#"
                                        class="block mt-4 lg:inline-block lg:mt-0 text-gray-600 hover:text-gray-400 mr-4">
                                        Features
                                    </a>
                                    <a href="#responsive-header"
                                        class="block mt-4 lg:inline-block lg:mt-0 text-gray-600 hover:text-gray-400 mr-4">
                                        Packages
                                    </a>
                                    <a href="#"
                                        class="block mt-4 font-semibold lg:inline-block lg:mt-0 text-gray-600 hover:text-gray-400">
                                        Jaraw Plus
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <div>
                                    <a href="#"
                                        class="inline-block text-sm font-semibold px-4 py-2 leading-none text-gray-600 hover:text-gray-400 mt-4 lg:mt-0">FAQ</a>
                                    <span class="text-gray-600 -ml-2">|</span>
                                </div>
                                @auth
                                    <a href="{{ route('devices') }}"
                                        class="inline-block text-sm font-semibold px-4 py-2 leading-none text-gray-600 hover:text-gray-400 mt-4 lg:mt-0">Devices</a>
                                    <userdropdown-component inline-template>
                                        <div>
                                            <a v-on:click.prevent="open = !open"
                                                class="cursor-pointer inline-block text-sm font-semibold px-4 py-2 leading-none text-gray-700 hover:text-gray-600 mt-4 lg:mt-0">{{ Auth::user()->name }}</a>

                                            <div v-if="open"
                                                class="absolute border border-gray-200 float-right mt-2 w-40 py-2 bg-white rounded-lg shadow-xl">
                                                <a href="#"
                                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-400 hover:text-white">Profile</a>
                                                <a href="{{ route('devices') }}"
                                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-400 hover:text-white">Devices</a>
                                                @can('access dashboard')
                                                    <a href="{{ route('dashboard.home') }}"
                                                        class="block px-4 py-2 border-t border-gray-200 text-gray-800 hover:bg-gray-400 hover:text-white">Dashboard</a>
                                                @endcan
                                                <a href="{{ route('logout') }}"
                                                    class="block px-4 py-2 border-t border-gray-200 text-gray-800 hover:bg-gray-400 hover:text-white">Log
                                                    out</a>
                                            </div>
                                        </div>
                                    </userdropdown-component>


                                @endauth

                                @guest
                                    <a href="{{ route('login') }}"
                                        class="inline-block text-md font-semibold px-4 py-2 leading-none text-gray-700 hover:text-gray-800 mt-4 lg:mt-0">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="inline-block text-md font-semibold px-4 py-2 leading-none text-gray-700 hover:text-gray-800 mt-4 lg:mt-0">Sign
                                        Up</a>
                                @endguest

                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <button v-on:click.prevent="sm_open = !sm_open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  focus:outline-none">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path v-if="!sm_open" class="inline-flex" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path v-if="sm_open" class="inline-flex" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="this.sm_open" class=" md:hidden block">
                    <div class="px-2 py-3 sm:px-3">
                        <a href="#"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700">
                            Features
                        </a>
                        <a href="#responsive-header"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700">
                            Packages
                        </a>
                        <a href="#"
                            class="mt-1 block px-3 py-2 rounded-md font-semibold text-base font-medium text-gray-600 hover:text-gray-800">
                            Jaraw Plus
                        </a>

                    </div>
                    <div class="pt-4 pb-3 border-t border-gray-300">
                        <a href="#"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700">
                            FAQ
                        </a>
                    </div>
                    @can('access dashboard')
                        <div class="pt-4 pb-3 border-t border-gray-300">
                            <a href="{{ route('dashboard.home') }}"
                                class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700">
                                Dashboard
                            </a>
                        </div>
                    @endcan
                    <div class="pt-4 pb-3 border-t border-gray-300">
                        <div class="flex items-center px-5 sm:px-6">
                            @auth
                                <a href="#"
                                    class="inline-block text-md font-semibold py-2 leading-none text-gray-700 hover:text-gray-600 ">{{ Auth::user()->name }}</a>
                            @endauth

                            @guest
                                <div class="flex-row">
                                    <a href="{{ route('login') }}"
                                        class="block text-md py-2 mr-2 font-semibold leading-none text-gray-700 hover:text-gray-800 hover:bg-gray-400 mt-4 lg:mt-0">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="block text-md py-2 font-semibold leading-none text-gray-700 hover:text-gray-800 hover:bg-gray-400 mt-4 lg:mt-0">Sign
                                        Up</a>
                                </div>
                            @endguest
                        </div>
                        @auth
                            <div class="mt-3 px-2 sm:px-3">
                                <a href="{{ route('devices') }}"
                                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">Devices</a>
                                <a href="{{ route('logout') }}"
                                    class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">Sign
                                    out</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </navigation-component>
        @auth
            @if (!auth()->user()->hasVerifiedEmail())
                @include('partials.banner.verify-email')
            @endif
        @endauth
        <main class="flex-grow">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>
<script>
    window.PUSHER_APP_KEY = '{{ config('broadcasting.connections.pusher.key') }}';
    window.APP_DEBUG = {{ config('app.debug') ? 'true' : 'false' }};
</script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</html>
