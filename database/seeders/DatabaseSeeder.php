<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder; // ✅ import this!

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}
