<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', HomeController::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::name('register.')->prefix('register')->controller(RegisterController::class)->group(function () {
        Route::get('/', 'renderPage')->name('renderPage');
        Route::post('/', 'handle')->name('handle');
    });

    Route::name('login')->prefix('login')->controller(LoginController::class)->group(function () {
        Route::get('/', 'renderPage');
        Route::post('/', 'handle')->name('.handle');
    });
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', LogoutController::class)->name('logout');
});
