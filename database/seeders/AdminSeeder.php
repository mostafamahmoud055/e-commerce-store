<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'mostafa ali',
            'email' => 'mostafamahmoud055@gmail.com',
            'username' => 'mostafa',
            'password' => Hash::make('123456'),
            'phone_number' => '90004000',
            'store_id' => 1
        ]);
    }
}
