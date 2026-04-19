<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This will only create the admin if the email doesn't already exist
        User::firstOrCreate(
            ['email' => 'admin@farmcare.com'], // unique identifier
            [
                'name' => 'Admin',
                'password' => Hash::make('supersecret123'), // change to whatever you want
                'is_admin' => 1,
                'email_verified_at' => now()
            ]
        );
    }
}