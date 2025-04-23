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
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Attempt ADMIN login
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Welcome Admin!');
        }
    
        // Attempt USER login (default guard)
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Login successful!');
        }
    
        // If both fail
        return back()->withErrors(['login_error' => 'Invalid credentials.']);
    }

    protected function attemptAdminLogin(Request $request)
        {
            $admin = Admin::where('email', $request->email)->first();
            
            if ($admin && Hash::check($request->password, $admin->password)) {
                Auth::guard('admin')->login($admin);
                return true;
            }

            return false;
        }

        public function logout(Request $request)
        {
            Auth::guard('web')->logout(); // Log out users
            Auth::guard('admin')->logout(); // Log out admins
        
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect('home')->with('success', 'Logged out successfully.');
        }
    }
