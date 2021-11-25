<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes([
    'confirm' => false,
    'login' => true,
    'logout' => true,
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::resource('microcontrollers', \App\Http\Controllers\MicroController::class);
    Route::resource('sensors', \App\Http\Controllers\SensorController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('scheme', App\Http\Controllers\SchemeController::class);
});
