<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function renderPage(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function handle(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (Auth::attempt($data) == false) {
            return to_route('login')
                ->withErrors(['email' => 'Пользователь не найден!']);
        }

        return to_route('home');
    }
}
