<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone' => '+6281234567800',
            'email_verified_at' => now(),
        ]);

        // Penjual
        User::create([
            'name' => 'Penjual Jaya',
            'email' => 'penjual@mail.com',
            'password' => Hash::make('12345678'),
            'role' => 'seller',
            'phone' => '+6283123250381',
            'email_verified_at' => now(),
        ]);

        // Pembeli
        User::create([
            'name' => 'Pembeli Setia',
            'email' => 'pembeli@mail.com',
            'password' => Hash::make('12345678'),
            'role' => 'buyer',
            'phone' => '+6281234567802',
            'email_verified_at' => now(),
        ]);
    }
}