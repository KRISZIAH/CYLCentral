<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    // List all users (admin only)
    public function index(Request $request)
    {
        // Optionally check role/permission
        if (!$request->user()->hasRole('admin')) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        $users = User::all();
        return response()->json($users);
    }
}
