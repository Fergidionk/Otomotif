<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'AdminOtomotif',
            'email' => 'admin@example.com',
            'password' => bcrypt('PasswordAdmin123'),
        ]);
    }
}
