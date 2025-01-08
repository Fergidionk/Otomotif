<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Cek apakah email sudah ada
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // Ganti dengan password aman
            ]
        );
    }
}
