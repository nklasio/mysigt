<?php

use App\Http\Controllers\DeviceBackupContoller;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/devices', [DeviceController::class, 'index'])->name('devices');
    Route::get('/device/{device:ecid}', [DeviceController::class, 'show'])->name('device');
    Route::get('/device/{device:ecid}/backup/{devicebackup}/delete', [DeviceBackupContoller::class, 'delete'])
        ->name('devicebackup.delete')->middleware(['password.confirm']);
});
require __DIR__ . '/auth.php';
