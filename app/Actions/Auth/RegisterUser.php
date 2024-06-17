<?php

declare(strict_types=1);

namespace App\Actions\Auth;
use App\Models\User;
use App\DTOs\RegisterUserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Actions\Contracts\Auth\RegisterUserContract;

class RegisterUser implements RegisterUserContract
{
    public function __invoke(RegisterUserDTO $data): void
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password)
        ]);

        Auth::login($user);
    }
}
