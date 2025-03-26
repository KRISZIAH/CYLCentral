<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('main/home'); // Home page at "/"
});

Route::get('/membership', function () {
    return view('main/membershippage'); // Membership page at "/membership"
});

Route::get('/editprofile', function () {
    return view('main/editprofile'); 
})->name('editprofile'); // to be used in the href attribute


Route::get('/events', function () {
    return view('main/eventcatalog'); 
});


Route::get('/files', function () {
    return view('main/files'); 
})->name('files');

Route::get('/pages', function () {
    return view('main/eventpages'); 
})->name('eventpage');

Route::get('/announcements', function () {
    return view('announcement_tab'); 
})->name('eventpage');


// Routes for admin dashboard
Route::get('/analytics', function () {
    return view('admin/dashboard_analytics'); 
});



use App\Http\Controllers\AnnouncementController;

Route::get('/announcements', [AnnouncementController::class, 'index']);

