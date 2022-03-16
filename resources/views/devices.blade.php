<?php /* @var \App\Models\Device $devices */ ?>
@extends('layouts.app')

@section('title', 'devices')


@section('content')
    <div class="flex justify-center mt-6 lg:mx-32">
        <div class="w-full px-8 pt-6 pb-8 mb-4 bg-gray-100 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold">Devices</h1>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($devices as $device)
                    <div class="p-8 my-4 -m-8 bg-white rounded-lg shadow-md lg:mx-4 ">
                        <div class="flex flex-col">
                            <div class="flex flex-col justify-between ">
                                <div class="flex justify-center">
                                    <div class="flex flex-col items-center">
                                        <div>
                                            {{-- TODO(#1): Add all devices :) --}}
                                            @include('devices.' . $device->model)

                                        </div>
                                        <div class="">
                                            <small>{{ $device->product_name }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between text-center">
                                        <span
                                                class="font-semibold">{{ str_replace('-', ' ', $device->device_name) }}</span>
                                    <div class="flex flex-col">
                                        <span class="text-sm">{{ $device->ecid }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div
                                        class="flex justify-center p-2 mt-4 border-2 border-indigo-300 border-dashed rounded-md ">
                                    <a class="" href="{{ route('device', $device->ecid) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                        </svg>
                                    </a>

                                    <a class="pl-2" href="{{ route('device', $device->ecid) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 pb-0 my-4 -m-8 bg-white rounded-lg shadow-md lg:mx-4">
                        <div class="flex flex-wrap items-center">
                            <div class="w-full text-center">
                                <h4 class="mb-1 text-2xl font-bold text-gray-800">You have not yet added any
                                    devices.</h4>
                                <p class="mb-8 text-gray-600">Check out how to do it over <a class="font-semibold"
                                                                                             href="#">here</a></p>
                            </div>
                        </div>
                    </div>
                @endforelse

                @if ($devices->count() == 1)
                    <div class="flex p-8 pb-0 my-4 -m-8 bg-white rounded-lg shadow-md lg:mx-4">
                        <div class="flex flex-wrap items-center w-full">
                            <div class="flex flex-col w-full text-center">
                                <h4 class="mb-1 text-2xl font-bold text-gray-800">Add more devices!</h4>
                                <p class="mb-8 text-gray-600">Check out how to do it over <a
                                            class="font-semibold text-indigo-600"
                                            href="#">here</a></p>
                            </div>
                        </div>
                    </div>
                @elseif($devices->count() == 2 &&
    !auth()->user()->can('jaraw plus'))
                    <div class="p-8 pb-0 my-4 -m-8 bg-white rounded-lg shadow-md lg:mx-4">
                        <div class="flex flex-wrap items-center">
                            <div class="flex flex-col w-full text-center">
                                <h4 class="mb-1 text-2xl font-bold text-gray-800">You have reached your maxium
                                    devices.</h4>
                                <p class="mb-8 text-gray-600">Check out how to add more with <a class="font-semibold"
                                                                                                href="#">JarawPlus</a>
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
            </div>
        </div>
@endsection
