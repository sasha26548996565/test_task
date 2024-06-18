<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Comment\CreateController;
use App\Http\Controllers\Comment\UpdateController;
use App\Http\Controllers\Comment\DestroyController;

Route::name('comment.')->prefix('comment')->group(function () {
    Route::post('/create/{post}', CreateController::class)->name('create');

    Route::middleware('editComment')->group(function () {
        Route::name('update.')->prefix('update')->controller(UpdateController::class)->group(function () {
            Route::get('/{comment}', 'renderPage')->name('renderPage');
            Route::patch('/{comment}', 'handle')->name('handle');
        });
    });

    Route::delete('/destroy/{comment}', DestroyController::class)
        ->middleware('destroyComment')->name('destroy');
});
