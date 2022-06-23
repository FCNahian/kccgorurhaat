<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CostInfoSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\CattleTypeSeeder;
use Database\Seeders\CattleColorSeeder;
use Database\Seeders\SubDistrictSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserRoleSeeder::class,
            UserSeeder::class,
            DistrictSeeder::class,
            SubDistrictSeeder::class,
            CattleTypeSeeder::class,
            CattleColorSeeder::class,
            CostInfoSeeder::class,
        ]);
    }
}