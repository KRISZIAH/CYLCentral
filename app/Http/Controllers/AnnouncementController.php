<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;


class AnnouncementController extends Controller
{
    public function announcement_user() {
        $announcements = Announcement::orderBy('date', 'desc')->get();
        
        if($announcements->isEmpty()) {
            // Optionally create a default announcement if none exist
            Announcement::create([
                'title' => 'Welcome!',
                'message' => 'This is your first announcement.',
                'date' => now()
            ]);
            $announcements = Announcement::all(); // Refresh the collection
        }
        
        return view('users.announcement', compact('announcements'));
    }
}
