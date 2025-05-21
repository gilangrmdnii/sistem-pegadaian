<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['name' => 'super_admin', 'display_name' => 'Super Admin'],
            ['name' => 'petugas', 'display_name' => 'Petugas Gadai'],
            ['name' => 'manajer', 'display_name' => 'Manajer Cabang'],
            ['name' => 'auditor', 'display_name' => 'Auditor'],
            ['name' => 'kasir', 'display_name' => 'Kasir'],
        ]);
    }
}
