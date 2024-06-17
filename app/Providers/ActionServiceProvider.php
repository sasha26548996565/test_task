<?php

declare(strict_types=1);

namespace App\Providers;

use App\Actions\Auth\RegisterUser;
use Illuminate\Support\ServiceProvider;
use App\Actions\Contracts\Auth\RegisterUserContract;

class ActionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RegisterUserContract::class, RegisterUser::class);
    }
}
