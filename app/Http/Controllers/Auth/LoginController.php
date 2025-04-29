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
    
        // Attempt ADMIN login first
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // Admin is authenticated, redirect to admin dashboard
            return redirect()->intended(route('dashboard'))->with('success', 'Welcome Admin!');
        }
    
        // Attempt USER login (default guard)
        if (Auth::attempt($request->only('email', 'password'))) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Check user role and redirect accordingly
            $adminRoles = ['Admin', 'Program Director', 'Executive Director'];
            
            if (in_array($user->role, $adminRoles)) {
                // For users with admin roles, we need to log them out of the web guard
                // and log them in with the admin guard to prevent redirection loops
                Auth::logout();
                
                // Check if admin record exists
                $admin = Admin::where('email', $user->email)->first();
                
                if (!$admin) {
                    // Create a new admin record
                    $admin = new Admin();
                    $admin->email = $user->email;
                    $admin->password = $user->password;
                    $admin->first_name = $user->first_name;
                    $admin->last_name = $user->last_name;
                    $admin->name = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''));
                    $admin->save();
                }
                
                // Log in as admin
                Auth::guard('admin')->login($admin);
                
                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Welcome ' . $user->role . '!');
            } else {
                // Regular users go to the home page
                return redirect()->intended(route('home'))
                    ->with('success', 'Login successful!');
            }
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
