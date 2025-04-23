<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // For checking admin credentials

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Your login form view
    }
    
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the user is an admin (by checking the admins table)
        $admin = Admin::where('email', $request->email)->first();
        
        if ($admin && \Hash::check($request->password, $admin->password)) {
            // Admin login success
            Auth::login($admin); // Log in as admin
            return redirect()->route('admin.dashboard_analytics')->with('success', 'Welcome Admin!');
        }

        // If not admin, check in the users table (regular members)
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // Regular user login success
            return redirect()->route('home')->with('success', 'Login successful! Welcome back.');
        }

        // If login fails for both admin and user
        return back()->withErrors(['login_error' => 'The username or password you entered don\'t match.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home')->with('success', 'Logged out successfully.');
    }
}
