<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard_users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.dashboard_users', compact('users'));
    }
}