<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

// Initial Route
Route::get('/', function () {
    return redirect()->route('home');
});



// Public Routes
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'aboutpage'])->name('about');
Route::get('/events', [PageController::class, 'eventcatalog'])->name('events');
Route::get('/membership', [PageController::class, 'membershippage'])->name('membership'); 
Route::get('/pages', [PageController::class, 'eventpages'])->name('pages'); 
// Adding a route for the contact page
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

//Temporary routes (For Admin Side)
// Route::get('/kpi', [PageController::class, 'dashboard_analytics'])->name('kpi');


// Authentication Routes (Only for guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Protected Routes (Only for logged-in users)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/files', [PageController::class, 'files'])->name('files');
    Route::get('/editprofile', [PageController::class, 'editProfile'])->name('editprofile');
    Route::get('/notifications', function() { return view('main.notification'); })->name('notifications');
});

// Authentication Routes for Admins
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [PageController::class, 'dashboard_users'])->name('users');
    Route::get('/programs', function () {
        return view('admin.db_programs');
    })->name('programs');
    Route::get('/db_newprogram', function () {
        return view('admin.db_newprogram');
    })->name('db_newprogram');
    Route::get('/events', [PageController::class, 'eventcatalog'])->name('events');
});

// for redirections in admin sidebar
Route::get('/cms', function () {
    return redirect()->route('programs');
});



Route::get('/users', function () {
    return redirect('/home');  // Redirects to the homepage or any existing route
})->name('users');

Route::get('/registrations', function () {
    return redirect('/home');  // Redirects to the homepage or any existing route
})->name('registrations');

Route::get('/payments', function () {
    return redirect('/home');  // Redirects to the homepage or any existing route
})->name('payments');

Route::get('/attendance', function () {
    return redirect('/home');  // Redirects to the homepage or any existing route
})->name('attendance');

Route::get('/announcements', function () {
    return redirect('/home');  // Redirects to the homepage or any existing route
})->name('announcements');

//users
Route::get('/users', [UserController::class, 'dashboard_users'])->name('users');


