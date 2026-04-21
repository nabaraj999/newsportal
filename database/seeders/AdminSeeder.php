<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@globalnews.com',
            'password' => Hash::make('admin@123'),
            'email_verified_at' => now(),
        ]);

        // Create editor user
        User::create([
            'name' => 'Editor User',
            'email' => 'editor@globalnews.com',
            'password' => Hash::make('editor@123'),
            'email_verified_at' => now(),
        ]);

        // Create test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@globalnews.com',
            'password' => Hash::make('test@123'),
            'email_verified_at' => now(),
        ]);
    }
}
