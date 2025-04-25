<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

// Public Routes
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/events', [PageController::class, 'eventcatalog'])->name('events');
Route::get('/membership', [PageController::class, 'membershippage'])->name('membership'); 
Route::get('/pages', [PageController::class, 'eventpages'])->name('pages'); 
Route::get('/eventregis', [PageController::class, 'eventregis'])->name('eventregis');

//Temporary routes (For Admin Side)
Route::get('/kpi', [PageController::class, 'dashboard_analytics'])->name('kpi');
Route::get('/users', [PageController::class, 'dashboard_users'])->name('users');


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
});

// for redirections
Route::get('/cms', function () {
    return redirect('/home');  // Redirects to the homepage or any existing route
})->name('cms');

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


