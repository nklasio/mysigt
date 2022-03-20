<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
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

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::get('/users', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('devices', [\App\Http\Controllers\Dashboard\DeviceController::class, 'index'])->name('dashboard.devices');
});


Route::middleware('auth')->group(function () {
    Route::get('/devices', [DeviceController::class, 'index'])->name('devices');
    Route::get('/device/{device:ecid}', [DeviceController::class, 'show'])->name('device');
    Route::get('/device/{device:ecid}/backup/{devicebackup}/delete', [DeviceBackupContoller::class, 'delete'])
        ->name('devicebackup.delete')->middleware(['password.confirm']);
});
require __DIR__ . '/auth.php';
