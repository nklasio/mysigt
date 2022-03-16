<?php /* @var \App\Models\Device $device */ ?>
@extends('layouts.app')

@section('title')
    {{ str_replace('-', ' ', $device->device_name) }}
@endsection


@section('content')
    <div class="flex flex-col  mt-6 lg:mx-32">
        <div class="flex justify-between px-4 py-2 m-2 align-baseline">
            <div>
                <span class="text-2xl font-semibold text-gray-800">Backups</span>
            </div>
            <div>
                <a href="{{ route('devices') }}">
                    <div class="flex justify-between align-baseline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"/>
                        </svg>
                        <span class="pl-1 font-semibold text-indigo-800">Back</span>
                    </div>
                </a>
            </div>
        </div>
        <div class=" px-8 pt-6 pb-2 mb-4 bg-gray-100 rounded-lg shadow-md">
            <div class="">
                {{-- Device Information --}}
                <div class="flex lg:flex-col pt-4 pb-3 bg-white rounded-lg border-b-2 border-indigo-300">
                    <div class="flex flex-col md:flex-row items-center p-2 w-full">
                        <div>
                            @include('devices.' . $device->model)
                        </div>
                        <div class="flex flex-col md:items-start items-center text-gray-700">
                            <span class="text-xl font-semibold text-gray-800">{{ str_replace('-', ' ',$device->device_name) }}</span>
                            <span>{{$device->product_name}} · {{ $device->build_version}}</span>
                            <span>{{$device->model}} · registered {{ $device->created_at->diffForHumans()}}</span>
                            <div class="flex flex-col text-center items-center md:items-start md:text-left md:flex-none md:flex-row">
                                <span>ECID: <span class="select-all">{{$device->ecid}}</span></span>
                                <span class="hidden md:block md:px-2"> · </span>
                                <span>UDID: <span class="select-all">{{ $device->uid}}</span></span>
                            </div>
                            <span>
                                <span>Total backups: {{ $device->backups->count() }}</span>
                                <!-- TODO: Actually provide total backup data's size -->
                                · Total size: 250MB
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Interactions --}}
                <livewire:backup-view :device="$device"></livewire:backup-view>
            </div>
        </div>
    </div>

@endsection
