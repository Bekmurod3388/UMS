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
Route::view('/interface','admin.interface')->name('interface');
Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('microcontrollers', App\Http\Controllers\MicroController::class);
    Route::resource('sensors', App\Http\Controllers\SensorController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('scheme', App\Http\Controllers\SchemeController::class);
    Route::resource('parameters', App\Http\Controllers\ParameterController::class);
    Route::get('reports',[\App\Http\Controllers\ReportController::class,'index'])->name('reports');
    Route::get('dashboard',[\App\Http\Controllers\ReportController::class,'dashboard'])->name('dashboard');
});

Route::get('/mqtt', [App\Http\Controllers\MQTTController::class, 'index']);
Route::get('/server', [App\Http\Controllers\MQTTController::class, 'server']);
