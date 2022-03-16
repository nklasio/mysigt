<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceBackup;
use Auth;

class DeviceBackupContoller extends Controller {
    public function delete(Device $device, DeviceBackup $devicebackup) {
        if (Auth::user()->id !== $devicebackup->user->id) {
            abort(401);
        }

        if ($devicebackup->device->id !== $device->id) {
            // TODO: Throw some exception --> Backup is not part of device
            abort(400);
        }
        $devicebackup->deleteOrFail();

        return redirect()->back();
    }
}
