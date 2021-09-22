<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => '000000000000001',
            'password' => Hash::make('password'),
            'status' => 'Admin'
        ]);
        User::create([
            'name' => 'User',
            'username' => '000000000000002',
            'password' => Hash::make('password'),
        ]);
    }
}
