<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_id' => 11,
            'name' => 'Collector',
            'phone' => '01711111111',
            'email' => 'collector@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'last_receipt_seriel_number' => 110000,
            'last_cash_receipt_seriel_number' => 110000,
        ]);

        User::create([
            'user_id' => 12,
            'name' => 'Collector2',
            'phone' => '01711111112',
            'email' => 'collector2@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'last_receipt_seriel_number' => 120000,
            'last_cash_receipt_seriel_number' => 120000,
        ]);

        User::create([
            'user_id' => 13,
            'name' => 'Collector3',
            'phone' => '01711111113',
            'email' => 'collector3@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'last_receipt_seriel_number' => 130000,
            'last_cash_receipt_seriel_number' => 130000,
        ]);

        User::create([
            'user_id' => 7,
            'name' => 'Accountant',
            'phone' => '01722222212',
            'email' => 'accountant@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'last_receipt_seriel_number' => 70000,
            'last_cash_receipt_seriel_number' => 70000,
        ]);

        User::create([
            'user_id' => 8,
            'name' => 'Accountant2',
            'phone' => '01722222222',
            'email' => 'accountant2@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'last_receipt_seriel_number' => 80000,
            'last_cash_receipt_seriel_number' => 80000,
        ]);

        User::create([
            'user_id' => 9,
            'name' => 'Accountant3',
            'phone' => '01722222232',
            'email' => 'accountant3@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'last_receipt_seriel_number' => 90000,
            'last_cash_receipt_seriel_number' => 90000,
        ]);

        User::create([
            'user_id' => 4,
            'name' => 'Admin',
            'phone' => '01733333133',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'last_receipt_seriel_number' => 40000,
            'last_cash_receipt_seriel_number' => 40000,
        ]);

        User::create([
            'user_id' => 5,
            'name' => 'Admin2',
            'phone' => '01733333233',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'last_receipt_seriel_number' => 50000,
            'last_cash_receipt_seriel_number' => 50000,
        ]);

        User::create([
            'user_id' => 6,
            'name' => 'Admin3',
            'phone' => '01733333333',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
            'last_receipt_seriel_number' => 60000,
            'last_cash_receipt_seriel_number' => 60000,
        ]);

        User::create([
            'user_id' => 1,
            'name' => 'Super Admin',
            'phone' => '01744441444',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
            'last_receipt_seriel_number' => 10000,
            'last_cash_receipt_seriel_number' => 10000,
        ]);

        User::create([
            'user_id' => 2,
            'name' => 'Super Admin2',
            'phone' => '0174442444',
            'email' => 'superadmin2@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
            'last_receipt_seriel_number' => 20000,
            'last_cash_receipt_seriel_number' => 20000,
        ]);

        User::create([
            'user_id' => 3,
            'name' => 'Super Admin3',
            'phone' => '01744443444',
            'email' => 'superadmin3@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
            'last_receipt_seriel_number' => 30000,
            'last_cash_receipt_seriel_number' => 30000,
        ]);
    }
}