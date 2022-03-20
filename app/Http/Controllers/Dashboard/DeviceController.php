<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DeviceController extends Controller {
    public function index() {
        return view('dashboard.home');
    }
}
