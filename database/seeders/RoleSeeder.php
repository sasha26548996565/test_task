<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use App\Enums\RoleList;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (RoleList::cases() as $role) {
            Role::create([
                'name' => $role->value
            ]);
        }
    }
}
