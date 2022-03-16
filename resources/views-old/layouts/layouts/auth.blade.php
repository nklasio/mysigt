@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-6">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">

                <div class="mb-4 ">
                    <span class=" text-4xl text-gray-900">@yield('header')</span>
                </div>
                <div class="mb-4">
                    @yield('form')
                </div>
            </div>
            <p class="text-center text-gray-500 text-xs">
                &copy;2019 Niklas Stambor. All rights reserved.
            </p>
        </div>
    </div>
@endsection
