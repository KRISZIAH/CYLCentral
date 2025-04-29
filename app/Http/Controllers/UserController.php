<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); // Add this line
    }

    public function dashboard_users()
    {
        // Double protection
        if (!auth()->guard('admin')->check()) {
            abort(403, 'Unauthorized access');
        }
        
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.db_users', compact('users'));
    }
    
    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
            'password' => 'nullable|string|min:8'
        ]);

        // Find the user
        $user = User::findOrFail($id);
        
        // Prepare user data for update
        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role
        ];
        
        // Only update password if provided
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        
        // Update the user
        $user->update($userData);
        
        return redirect()->route('dashboard.users')->with('success', 'User updated successfully');
    }
    
    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        // Find the user
        $user = User::findOrFail($id);
        
        // Delete the user
        $user->delete();
        
        return redirect()->route('dashboard.users')->with('success', 'User deleted successfully');
    }
    
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        return view('admin.create_user');
    }
    
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);
        
        // Create the user
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('dashboard.users')->with('success', 'User created successfully');
    }
}