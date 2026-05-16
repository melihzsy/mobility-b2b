<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Önce Rolleri Oluşturalım
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'description' => 'System Administrator']);
        $userRole = Role::firstOrCreate(['name' => 'user', 'description' => 'Regular User']);

        // 2. İlk Admin Kullanıcısını Oluşturalım
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@mysite.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345'),
            ]
        );

        // 3. Kullanıcıya Rollerini Atayalım
        $adminUser->roles()->syncWithoutDetaching([
            $adminRole->id,
            $userRole->id,
        ]);
    }
}