<?php

use App\Http\Controllers\CheckEmployee;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDriverlicenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CheckEmployee::class, 'index'])->name('login');

Route::post('login', [CheckEmployee::class, 'login'])->name('check-emp');
Route::get('logout', [CheckEmployee::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('home', [EmployeeController::class, 'index'])->name('home');
    Route::get('profile', [EmployeeController::class, 'show'])->name('profile');
    Route::get('employee/photo', [EmployeeController::class, 'showPhoto'])->name('emp.photo');

    Route::get('driverlc' , [EmployeeDriverlicenseController::class , 'index'])->name('driver-license');
});
