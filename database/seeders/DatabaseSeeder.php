<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [];

        for ($i = 1; $i < 8; $i++) {
            $users[] = [
                'user_id' => $i,
                'role_id' => $i+1,
            ];
        }
        UserRole::insert($users);
    }
}
