<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@breaknlinks.com'],
            [
                'user_name' => 'Admin',
                'full_name' => 'Admin',
                'email' => 'admin@breaknlinks.com',
                'is_super' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(30),
            ]);
    }
}
