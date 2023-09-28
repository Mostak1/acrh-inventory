<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
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
        $faker = Faker::create();
        $permission = [];

        for ($i = 1; $i < 20; $i++) {
            $permission[] = [
                'permissions_name' => $faker->name ,
                'permissions_code' => $faker->unique()->numberBetween($min =141, $max = 160),
                'url'=>'http://127.0.0.1:8000/' ,
                'request_method'=>"DELETE",
            ];
        }
        // Permission::insert($permission);

        
        $role = [];

        for ($i = 1; $i < 20; $i++) {
            $role[] = [
                'role_name' => $faker->firstName ,
                'is_active' => true,
                
            ];
        }
        // Role::insert($role);

        $rolep = [];

        for ($i = 1; $i < 5; $i++) {
            $rolep[] = [
                'role_id' =>7 ,
                'permission_id' => $i,
                
            ];
        }
        // RolePermission::insert($rolep);
        $user_role = [];
// 65-role,43-user
        for ($i = 1; $i < 80; $i++) {
            $user_role[] = [
                'role_id' =>rand(1,4),
                'user_id' =>rand(1,43),
                
            ];
        }
        // for ($i = 1, $j = 4; $i < 11 && $j < 15; $j++, $i++) {
        //     $user_role[] = [
        //         'role_id' => $i,
        //         'user_id' => $j,
        //     ];
        // }
        
         UserRole::insert($user_role);

    }
}
