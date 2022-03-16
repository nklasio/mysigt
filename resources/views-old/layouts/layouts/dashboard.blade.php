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
<body class="bg-gray-300 antialiased">
    <div id="app" class="w-full  min-h-screen flex flex-col">
        <navigation-component inline-template>
            <nav class="bg-white p-6 py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <a href="{{ route('dashboard.home')}}"><span class="font-semibold text-xl tracking-tight">jaraw</span></a>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline">
                                    <a href="{{ route('home')}}" class="block mt-4 lg:inline-block lg:mt-0 text-gray-600 hover:text-gray-400 mr-4">
                                        back to jaraw
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <a href="{{ route('devices') }}" class="inline-block text-sm font-semibold px-4 py-2 leading-none text-gray-600 hover:text-gray-400 mt-4 lg:mt-0">Devices</a>
                                <userdropdown-component inline-template>
                                    <div>
                                        <a v-on:click.prevent="open = !open" class="cursor-pointer inline-block text-sm font-semibold px-4 py-2 leading-none text-gray-700 hover:text-gray-600 mt-4 lg:mt-0">{{ Auth::user()->name }}</a>

                                        <div v-if="open" class="absolute border border-gray-200 float-right mt-2 w-40 py-2 bg-white rounded-lg shadow-xl">
                                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-400 hover:text-white">Profile</a>
                                            <a href="{{ route('logout') }}" class="block px-4 py-2 border-t border-gray-200 text-gray-800 hover:bg-gray-400 hover:text-white">Log out</a>
                                        </div>
                                    </div>
                                </userdropdown-component>
                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <button v-on:click.prevent="sm_open = !sm_open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  focus:outline-none">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path v-if="!sm_open" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path v-if="sm_open" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="this.sm_open" class=" md:hidden block">
                    <div class="px-2 py-3 sm:px-3">
                        <a href="{{ route('home')}}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700">
                            back to jaraw
                        </a>
                    </div>
                    <div class="pt-2 ">
                        <a href="{{ route('dashboard.home') }}" >
                            <div class="mt-3 px-2 sm:px-3 flex flex-row mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="w-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                <span class="pl-2">Index</span>
                            </div>
                        </a>
                    </div>
                    <div class="pt-2 pb-3">
                        <a href="{{ route('dashboard.users') }}" >
                            <div class="mt-3 px-2 sm:px-3 flex flex-row mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="w-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>

                                <span class="pl-2">Users</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('dashboard.devices') }}">
                            <div class="mt-3 px-2 sm:px-3 flex flex-row mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path fill="#4A5568" d="M9.228 3.684L8.279 4l.949-.316zm1.498 4.493l-.949.316.949-.316zm-.502 1.21l.447.895-.447-.894zm-2.257 1.13l-.447-.895a1 1 0 00-.465 1.306l.912-.412zm5.516 5.516l-.41.912a1 1 0 001.305-.465l-.895-.447zm1.13-2.257l-.895-.447.894.447zm1.21-.502l-.316.949.316-.949zm4.493 1.498l.317-.949-.317.95zM5 2a3 3 0 00-3 3h2a1 1 0 011-1V2zm3.28 0H5v2h3.28V2zm1.897 1.368A2 2 0 008.279 2v2l1.898-.632zm1.497 4.493l-1.497-4.493L8.279 4l1.498 4.493 1.897-.632zm-1.002 2.421a2 2 0 001.002-2.421l-1.897.632.895 1.79zm-2.258 1.129l2.258-1.129-.895-1.789-2.257 1.13.894 1.788zm5.48 3.71a10.042 10.042 0 01-5.015-5.016l-1.824.822a12.042 12.042 0 006.018 6.018l.822-1.824zm-.176-1.793l-1.129 2.258 1.789.894 1.129-2.257-1.79-.895zm2.421-1.002a2 2 0 00-2.421 1.002l1.789.895.632-1.897zm4.494 1.497l-4.494-1.497-.632 1.897L20 15.72l.633-1.898zM22 15.721a2 2 0 00-1.367-1.898L20 15.721h2zM22 19v-3.28h-2V19h2zm-3 3a3 3 0 003-3h-2a1 1 0 01-1 1v2zm-1 0h1v-2h-1v2zM2 6c0 8.837 7.163 16 16 16v-2C10.268 20 4 13.732 4 6H2zm0-1v1h2V5H2z"/>
                                </svg>
                                <span class="pl-2">Devices</span>
                            </div>
                        </a>
                    </div>
                    <div class="pt-4 pb-3 border-t border-gray-300">
                        <div class="flex items-center px-5 sm:px-6">
                            <a href="#"class="inline-block text-md font-semibold py-2 leading-none text-gray-700 hover:text-gray-600 ">{{ Auth::user()->name }}</a>
                        </div>
                        <div class="mt-3 px-2 sm:px-3">
                            <a href="{{ route('logout') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">Sign out</a>
                        </div>
                    </div>
                </div>
            </nav>
        </navigation-component>
        <div class="flex flex-row">
            <div class="hidden md:block bg-gray-100 flex flex-col p-8 w-1/6 h-screen overflow-hidden shadow-md">
                <span class="font-semibold text-lg">Dashboard</span>
                <div class="pt-2 ">
                    <a href="{{ route('dashboard.home') }}" >
                        <div class="mt-3 px-2 sm:px-3 flex flex-row mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <svg class="w-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="pl-2">Index</span>
                        </div>
                    </a>
                </div>
                <div class="pt-2 pb-3">
                    <a href="{{ route('dashboard.users') }}" >
                        <div class="mt-3 px-2 sm:px-3 flex flex-row mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <svg class="w-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>

                            <span class="pl-2">Users</span>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="{{ route('dashboard.devices') }}">
                        <div class="mt-3 px-2 sm:px-3 flex flex-row mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path fill="#4A5568" d="M9.228 3.684L8.279 4l.949-.316zm1.498 4.493l-.949.316.949-.316zm-.502 1.21l.447.895-.447-.894zm-2.257 1.13l-.447-.895a1 1 0 00-.465 1.306l.912-.412zm5.516 5.516l-.41.912a1 1 0 001.305-.465l-.895-.447zm1.13-2.257l-.895-.447.894.447zm1.21-.502l-.316.949.316-.949zm4.493 1.498l.317-.949-.317.95zM5 2a3 3 0 00-3 3h2a1 1 0 011-1V2zm3.28 0H5v2h3.28V2zm1.897 1.368A2 2 0 008.279 2v2l1.898-.632zm1.497 4.493l-1.497-4.493L8.279 4l1.498 4.493 1.897-.632zm-1.002 2.421a2 2 0 001.002-2.421l-1.897.632.895 1.79zm-2.258 1.129l2.258-1.129-.895-1.789-2.257 1.13.894 1.788zm5.48 3.71a10.042 10.042 0 01-5.015-5.016l-1.824.822a12.042 12.042 0 006.018 6.018l.822-1.824zm-.176-1.793l-1.129 2.258 1.789.894 1.129-2.257-1.79-.895zm2.421-1.002a2 2 0 00-2.421 1.002l1.789.895.632-1.897zm4.494 1.497l-4.494-1.497-.632 1.897L20 15.72l.633-1.898zM22 15.721a2 2 0 00-1.367-1.898L20 15.721h2zM22 19v-3.28h-2V19h2zm-3 3a3 3 0 003-3h-2a1 1 0 01-1 1v2zm-1 0h1v-2h-1v2zM2 6c0 8.837 7.163 16 16 16v-2C10.268 20 4 13.732 4 6H2zm0-1v1h2V5H2z"/>
                            </svg>
                            <span class="pl-2">Devices</span>
                        </div>
                    </a>
                </div>

            </div>
            <main class="flex-grow overflow-hidden overflow-x-scroll">
                @yield('content')
            </main>
        </div>

    </div>
</body>
<script>
    window.PUSHER_APP_KEY = '{{ config('broadcasting.connections.pusher.key') }}';
    window.APP_DEBUG = {{ config('app.debug') ? 'true' : 'false' }};
</script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</html>
