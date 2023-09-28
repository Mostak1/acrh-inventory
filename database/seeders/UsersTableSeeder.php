<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = [];

        for ($i = 5; $i < 30; $i++) {
            $users[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => 'user'.$i.'@gmail.com',
                'password' => bcrypt('12341234'),
                'phone_no' => '123456789'.$i,
                'user_status' => 'active',
                'is_active' => true,
            ];
        }
        // User::insert($users);
        // php artisan db:seed --class=UsersTableSeeder

    }
}
