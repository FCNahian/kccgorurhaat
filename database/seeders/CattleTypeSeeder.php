<?php

namespace Database\Seeders;

use App\Models\CattleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CattleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CattleType::create([
            'name' => 'গরু',
        ]);

        CattleType::create([
            'name' => 'ছাগল',
        ]);

        CattleType::create([
            'name' => 'মহিষ',
        ]);

        CattleType::create([
            'name' => 'ভেড়া',
        ]);

        CattleType::create([
            'name' => 'উট',
        ]);

        CattleType::create([
            'name' => 'দুম্বা',
        ]);

        CattleType::create([
            'name' => 'খচ্চর',
        ]);
    }
}