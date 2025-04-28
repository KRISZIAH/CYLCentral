<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController
{

    public function showRegistrationForm()
    {
    return view('auth.register'); // ✅ Make sure 'auth.register' exists
    }

    public function register(Request $request)
{
    // Combine first_name and last_name into name for validation compatibility
    $request->merge([
        'name' => trim(($request->first_name ?? '') . ' ' . ($request->last_name ?? ''))
    ]);
    $messages = [
        'first_name.required' => 'Please enter your first name.',
        'last_name.required' => 'Please enter your last name.',
        'email.required' => 'An email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'phone.required' => 'Please enter your phone number.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 6 characters.',
        'password.confirmed' => 'Passwords do not match.',
    ];

    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone' => 'required|string|max:15',
        'password' => 'required|string|min:6|confirmed',
    ], $messages);

    User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password), // Store hashed password
    ]);

    // Store success message in session
    return redirect()->route('login')->with('success', 'Account created successfully! You can now log in.');
}

}