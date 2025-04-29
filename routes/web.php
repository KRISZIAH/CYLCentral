<?php

use Illuminate\Support\Facades\Route;

Route::get('/db_draftprog', function () {
    return redirect()->route('programs.drafts');
})->name('db_draftprog');

// Redirects to the new programs route
Route::get('/db_programs', function () {
    return redirect()->route('programs.index');
})->name('db_programs');

Route::get('/db_announcement', function () {
    return view('admin.db_announcement');
})->name('db_announcement');


Route::get('/db_membership', function () {
    return view('admin.db_membership');
})->name('db_membership');
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProgramController;

// Initial Route
Route::get('/', function () {
    return redirect()->route('home');
});



// Public Routes
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'aboutpage'])->name('about');
Route::get('/events', [PageController::class, 'eventcatalog'])->name('events');
Route::get('/membership', [PageController::class, 'membershippage'])->name('membership'); 
Route::get('/membership_reg', [PageController::class, 'membership_reg'])->name('membership_reg'); 
Route::get('/pages', [PageController::class, 'eventpages'])->name('pages'); 
// Adding a route for the contact page
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Admin Profile Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/editprofile', [AdminProfileController::class, 'edit'])->name('admin.editprofile');
    Route::put('/admin/editprofile', [AdminProfileController::class, 'update'])->name('admin.updateprofile');
    Route::post('/admin/logout', function() {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    })->name('admin.logout');
});

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
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::get('/programs/drafts', [ProgramController::class, 'drafts'])->name('programs.drafts');
    Route::get('/programs/create', [ProgramController::class, 'create'])->name('programs.create');
    Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
    Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
    Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
    Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
    Route::get('/events', [PageController::class, 'eventcatalog'])->name('events');
});

// for redirections in admin sidebar
Route::get('/cms', function () {
    return redirect()->route('programs.index');
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


Route::get('/announcements_user', [AnnouncementController::class, 'announcement_user'])->name('announcements_user');



//ADMIN SIDE
//----------------Get users----------------//
Route::get('/admin/db_users', [UserController::class, 'dashboard_users'])->name('db_users');
Route::get('/admin/users', [UserController::class, 'dashboard_users'])->name('dashboard.users');

//----------------User Management Routes----------------//
// Update user
Route::put('/admin/users/{id}', [UserController::class, 'updateUser'])->name('updateUser');
// Delete user
Route::delete('/admin/users/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
// Create user form
Route::get('/admin/users/create', [UserController::class, 'createUser'])->name('createUser');
// Store new user
Route::post('/admin/users', [UserController::class, 'storeUser'])->name('storeUser');