<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement; 

class AnnouncementController extends Controller
{
    public function index() {
        $announcements = Announcement::all();
        return view('announcement_tab', compact('announcements')); // ✅ Pass data to view
    }
}
