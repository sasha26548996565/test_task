<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Enums\RoleList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(50)->create();

        $this->createEditor();
    }

    private function createEditor(): void
    {
        $editorRole = Role::where('name', RoleList::EDITOR->value)->first();

        User::create([
            'name' => 'tester1',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('tester123'),
            'role_id' => $editorRole->id
        ]);
    }
}
