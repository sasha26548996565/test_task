<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;

Route::name('post.')->prefix('post')->group(function () {
    Route::get('/show/{post}', ShowController::class)->name('show');

    Route::middleware('auth')->group(function () {
        Route::name('create.')->prefix('create')->controller(CreateController::class)->group(function () {
            Route::get('/', 'renderPage')->name('renderPage');
            Route::post('/', 'handle')->name('handle');
        });

        Route::middleware('editPost')->group(function () {
            Route::name('update.')->prefix('update')->controller(UpdateController::class)->group(function () {
                Route::get('/{post}', 'renderPage')->name('renderPage');
                Route::patch('/{post}', 'handle')->name('handle');
            });
        });

        Route::delete('/delete/{post}', DestroyController::class)
            ->middleware('destroyPost')
            ->name('destroy');
    });
});
