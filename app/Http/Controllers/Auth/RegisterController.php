<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use App\DTOs\RegisterUserDTO;
use App\Actions\Auth\RegisterUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function renderPage(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function handle(RegisterRequest $request, RegisterUser $action): RedirectResponse
    {
        $data = RegisterUserDTO::from($request->validated());
        $action($data);

        return to_route('home');
    }
}
