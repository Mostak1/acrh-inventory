<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role_name' => 'Admin', 'is_active' => true],
            ['role_name' => 'User', 'is_active' => true],
            ['role_name' => 'Guest', 'is_active' => false],
        ];

       
        // Role::insert($roles);
    }
}
