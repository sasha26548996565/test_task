<?php

declare(strict_types=1);

namespace App\Actions\Contracts\Auth;

use App\DTOs\RegisterUserDTO;

interface RegisterUserContract
{
    public function __invoke(RegisterUserDTO $data): void;
}
