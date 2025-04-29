<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller{

    public function showUsers(){
        $users = \App\Models\User::select('id', 'first_name', 'last_name', 'email', 'phone', 'role', 'created_at')->get();
        $admins = \App\Models\Admin::select('id', 'email', 'created_at')->get();

        // Normalize users
        $users = $users->map(function($user) {
            return [
                'id' => $user->id ?? '-',
                'first_name' => $user->first_name ?? '-',
                'last_name' => $user->last_name ?? '-',
                'email' => $user->email ?? '-',
                'phone' => $user->phone ?? '-',
                'role' => $user->role ?? 'Participant',
                'created_at' => $user->created_at ?? '-',
            ];
        });

        // Normalize admins (admins table has only email and created_at)
        $admins = $admins->map(function($admin) {
            return [
                'id' => $admin->id ?? '-',
                'first_name' => '-',
                'last_name' => '-',
                'email' => $admin->email ?? '-',
                'phone' => '-',
                'role' => 'Admin',
                'created_at' => $admin->created_at ?? '-',
            ];
        });

        // Merge and sort
        $all = $users->concat($admins)->sortByDesc('created_at')->values();

        // Manual pagination
        $perPage = 5;
        $currentPage = request()->get('page', 1);
        $paged = new LengthAwarePaginator(
            $all->forPage($currentPage, $perPage),
            $all->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.db_users', ['users' => $paged]);
    }
    public function editUser($id){
        $user = \App\Models\User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }
    
    public function updateUser(Request $request, $id){
        $user = \App\Models\User::findOrFail($id);
    
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->save();
    
        return redirect()->route('db_users')->with('success', 'User updated successfully!');
    }

}