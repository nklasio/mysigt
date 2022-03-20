<?php
/*
 * Copyright (c) 2022. Niklas Stambor
 * All rights reserved
 */

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller {
    public function index() {
        $user = Auth::user()->load('devices');

        return view('devices', ['devices' => $user->devices]);
    }

    public function show(Device $device) {
        $device->load('backups');
        return view('device.device')->withDevice($device);
    }
}
