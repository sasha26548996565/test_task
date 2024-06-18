<?php

declare(strict_types=1);

namespace App\Actions\Auth;
use App\Models\Role;
use App\Models\User;
use App\Enums\RoleList;
use App\DTOs\RegisterUserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function __invoke(RegisterUserDTO $data): void
    {
        $roleUser = Role::where('name', RoleList::USER->value)->first();

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'role_id' => $roleUser->id
        ]);

        Auth::login($user);
    }
}
