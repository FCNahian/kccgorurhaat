<?php

namespace Database\Seeders;

use App\Models\CattleColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CattleColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CattleColor::create([
            'name' => 'সাদা',
        ]);

        CattleColor::create([
            'name' => 'কালো',
        ]);

        CattleColor::create([
            'name' => 'ধূসর',
        ]);

        CattleColor::create([
            'name' => 'বাদামী',
        ]);

        CattleColor::create([
            'name' => 'সোনালী',
        ]);

        CattleColor::create([
            'name' => 'লাল',
        ]);

        CattleColor::create([
            'name' => 'হলুদ',
        ]);

        CattleColor::create([
            'name' => 'মিশ্র',
        ]);;
    }
}