<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'role_id' =>  1,
            'role_name' => 'collector'
        ]);

        UserRole::create([
            'role_id' =>  2,
            'role_name' => 'accountant'
        ]);

        UserRole::create([
            'role_id' =>  3,
            'role_name' => 'admin'
        ]);

        UserRole::create([
            'role_id' =>  4,
            'role_name' => 'super admin'
        ]);
    }
}