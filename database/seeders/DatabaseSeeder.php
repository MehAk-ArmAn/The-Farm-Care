<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@thefarmcare.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin12345'),
                'is_admin' => 1, // now matches your table
            ]
        );
    }
}