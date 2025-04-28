<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::get('/about', function () {
    return view('main.aboutpage');
})->name('about');

Route::get('/events', function () {
    return view('main.eventcatalog');
})->name('events');

Route::get('/membership', function () {
    return view('main.membershippage');
})->name('membership');

Route::get('/editprofile', function () {
    return view('main.editprofile');
})->name('editprofile');

Route::get('/dashboard', function () {
    return view('main.home');
})->name('dashboard');

Route::get('/files', function () {
    return view('main.files');
})->name('files');

Route::get('/db_announcement', function () {
    return view('admin.db_announcement');
})->name('db_announcement');

Route::get('/db_programs', function () {
    return view('admin.db_programs');
})->name('db_programs');

Route::get('/db_newprogram', function () {
    return view('admin.db_newprogram');
})->name('db_newprogram');

Route::get('/db_users', function () {
    return view('admin.db_users');
})->name('db_users');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');

require __DIR__.'/auth.php';
