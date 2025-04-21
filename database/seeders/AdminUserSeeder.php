<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'AdminJB',
            'email' => 'jbosch4000@gmail.com',
            'password' => Hash::make('Password123'),
            'is_admin' => true,
        ]);
    }
}
