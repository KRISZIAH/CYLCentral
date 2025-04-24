<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

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
}