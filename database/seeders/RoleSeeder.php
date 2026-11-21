<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Создаём роли
        $moderatorRole = Role::firstOrCreate([
            'name' => 'moderator',
        ]);

        Role::firstOrCreate([
            'name' => 'reader',
        ]);

        // Создаём пользователя-модератора
        User::firstOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Moderator',
                'password' => 'password123',
                'role_id' => $moderatorRole->id,
            ]
        );
    }
}
