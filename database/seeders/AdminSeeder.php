<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Delete all existing admins to ensure only one exists
        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            'name' => 'CYLC Admin',
            'email' => 'admin@cylc.com',
            'password' => Hash::make('CYLCentralAdmin'),
        ]);
        
        // Check if admin user already exists in users table
        $adminExists = DB::table('users')->where('email', 'admin@cylc.com')->exists();
        
        if (!$adminExists) {
            DB::table('users')->insert([
                'first_name' => 'CYLC',
                'last_name' => 'Admin',
                'email' => 'admin@cylc.com',
                'phone' => '09123456789',
                'role' => 'Admin',
                'password' => Hash::make('CYLCentralAdmin'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}