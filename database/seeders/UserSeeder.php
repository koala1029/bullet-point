<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'nickname' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('12345678'),
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nickname' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
