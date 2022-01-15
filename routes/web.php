<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    if (auth()->user())
        return redirect()->route('admin.home');
    return redirect()->route('login');
});


Auth::routes([
    'confirm' => false,
    'login' => true,
    'logout' => true,
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('microcontrollers', App\Http\Controllers\MicroController::class);
    Route::resource('sensors', App\Http\Controllers\SensorController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('scheme', App\Http\Controllers\SchemeController::class);
});

Route::get('/mqtt', [App\Http\Controllers\MQTTController::class, 'index']);
