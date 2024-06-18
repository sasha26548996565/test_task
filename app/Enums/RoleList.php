<?php

declare(strict_types=1);

namespace App\Enums;

enum RoleList: string
{
    case USER = 'user';
    case EDITOR = 'editor';
}
