<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create sample writer
        User::create([
            'name' => 'Test Writer',
            'email' => 'writer@example.com',
            'password' => Hash::make('password'),
            'role' => 'writer',
            'is_approved' => true,
            'email_verified_at' => now(),
        ]);

        // Create sample unapproved writer
        User::create([
            'name' => 'Pending Writer',
            'email' => 'pending@example.com',
            'password' => Hash::make('password'),
            'role' => 'writer',
            'is_approved' => false,
            'email_verified_at' => now(),
        ]);

        // Create sample reader
        User::create([
            'name' => 'Test Reader',
            'email' => 'reader@example.com',
            'password' => Hash::make('password'),
            'role' => 'reader',
            'is_approved' => true,
            'email_verified_at' => now(),
        ]);
    }
}