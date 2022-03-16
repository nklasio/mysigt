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
        return view('devices')->withDevices(Auth::user()->devices);
    }

    public function show(Device $device) {
        return view('device.device')->withDevice($device);
    }
}
