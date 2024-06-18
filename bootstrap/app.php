<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EditPostMiddleware;
use App\Http\Middleware\DestroyPostMiddleware;
use App\Http\Middleware\EditCommentMiddleware;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\DestroyCommentMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->group(base_path('/routes/post.php'));
            Route::middleware('web')->group(base_path('/routes/comment.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);

        $middleware->alias([
            'editPost' => EditPostMiddleware::class,
            'destroyPost' => DestroyPostMiddleware::class,
            'editComment' => EditCommentMiddleware::class,
            'destroyComment' => DestroyCommentMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
