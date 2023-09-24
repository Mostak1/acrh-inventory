<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        for ($i = 0; $i < 3; $i++) {
            $users[] = [
                'first_name' => 'User'.$i,
                'last_name' => 'Doe',
                'email' => 'user'.$i.'@gmail.com',
                'password' => bcrypt('password123'),
                'phone_no' => '123456789'.$i,
                'user_status' => 'active',
                'is_active' => true,
            ];
        }
        // User::insert($users);
    }
}
