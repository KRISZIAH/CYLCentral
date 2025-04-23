<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard_analytics'); // make sure this view exists
    }
}