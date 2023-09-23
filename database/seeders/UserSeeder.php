<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'ali',
            'last_name' => 'ali',
            'email' => 'mostafamahmoud055@gmail.com',
            'password' => Hash::make('123456'),
            'phone_number' => '90004000',
        ]);
        User::create([
            'first_name' => 'ahmed',
            'last_name' => 'ahmed',
            'email' => 'ah@gmail.com',
            'password' => Hash::make('123456'),
            'phone_number' => '90005000',
        ]);
    }
}
