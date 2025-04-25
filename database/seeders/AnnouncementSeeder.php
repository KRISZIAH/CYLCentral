<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Announcement::create([
            'title' => 'First Announcement',
            'message' => 'This is your first announcement message.',
            'date' => now(),
        ]);
        
        \App\Models\Announcement::create([
            'title' => 'Important Update',
            'message' => 'Please be advised of system maintenance this weekend.',
            'date' => now()->addDays(2),
        ]);
    }
}
