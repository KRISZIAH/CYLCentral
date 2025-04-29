<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    // Show the admin profile edit form
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.editprofile', compact('admin'));
    }

    // Update the admin profile
    public function update(Request $request)
    {
        $admin = Auth::user();
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $admin->first_name = $validated['first_name'];
        $admin->last_name = $validated['last_name'];
        $admin->email = $validated['email'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($admin->profile_photo) {
                Storage::delete('public/' . $admin->profile_photo);
            }
            $path = $request->file('profile_photo')->store('admin_profiles', 'public');
            $admin->profile_photo = $path;
        }

        $admin->save();
        return redirect()->route('admin.editprofile')->with('success', 'Profile updated successfully.');
    }
}
