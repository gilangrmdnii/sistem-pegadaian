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
        // Ambil role yang sudah ada di tabel roles
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $manajerRole = Role::where('name', 'manajer')->first();
        $auditorRole = Role::where('name', 'auditor')->first();
        $kasirRole = Role::where('name', 'kasir')->first();

        // Contoh tambah user untuk tiap role
        User::create([
            'role_id' => $superAdminRole->id,
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
        ]);

        User::create([
            'role_id' => $petugasRole->id,
            'name' => 'Petugas Gadai',
            'email' => 'petugas@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => $manajerRole->id,
            'name' => 'Manajer Cabang',
            'email' => 'manajer@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => $auditorRole->id,
            'name' => 'Auditor',
            'email' => 'auditor@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => $kasirRole->id,
            'name' => 'Kasir',
            'email' => 'kasir@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
