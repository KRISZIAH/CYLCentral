<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home'); // Home page at "/"
});

Route::get('/membership', function () {
    return view('membershippage'); // Membership page at "/membership"
});

Route::get('/editprofile', function () {
    return view('editprofile'); 
})->name('editprofile'); // to be used in the href attribute


Route::get('/events', function () {
    return view('eventcatalog'); 
});


Route::get('/files', function () {
    return view('files'); 
})->name('files');

Route::get('/pages', function () {
    return view('eventpages'); 
})->name('eventpage');


// Routes for admin dashboard
Route::get('/analytics', function () {
    return view('dashboard_analytics'); 
});

