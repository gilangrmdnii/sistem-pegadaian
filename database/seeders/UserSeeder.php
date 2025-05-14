<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Menambahkan role jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // Menambahkan pengguna
        User::create([
            'role_id' => $adminRole->id, // Mengambil role id admin
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // password default
        ]);
    }
}
