<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah user admin sudah ada
        $existingAdmin = User::where('email', 'admin@example.com')->first();

        if (!$existingAdmin) {
            // Buat admin baru jika belum ada
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Password default hanya untuk admin baru
                'role' => 'admin',
            ]);
        } else {
            // Update hanya role menjadi admin, tanpa mengubah password
            $existingAdmin->update([
                'role' => 'admin'
            ]);
        }
    }
}
