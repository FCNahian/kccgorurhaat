<?php

namespace Database\Seeders;

use App\Models\CostInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CostInfo::create([
            'name' => 'খুঁটির মূল্য',
            'amount' => 50,
        ]);

        CostInfo::create([
            'name' => 'খাজনা',
            'amount' => 5,
        ]);
    }
}