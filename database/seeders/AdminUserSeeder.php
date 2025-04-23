<?php

// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            // 'name' => 'Admin',
            'email' => 'admin@example.com', // Admin email
            'password' => Hash::make('password123'), // Hashed password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

