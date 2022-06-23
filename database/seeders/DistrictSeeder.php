<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'name' => 'খুলনা'
        ]);

        District::create([
            'name' => 'বাগেরহাট'
        ]);

        District::create([
            'name' => 'সাতক্ষীরা'
        ]);

        District::create([
            'name' => 'যশোর'
        ]);

        District::create([
            'name' => 'নড়াইল'
        ]);

        District::create([
            'name' => 'মাগুরা'
        ]);

        District::create([
            'name' => 'ঝিনাইদহ'
        ]);

        District::create([
            'name' => 'কুষ্টিয়া'
        ]);

        District::create([
            'name' => 'চুয়াডাঙ্গা'
        ]);

        District::create([
            'name' => 'মেহেরপুর'
        ]);
    }
}