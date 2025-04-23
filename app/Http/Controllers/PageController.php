<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home()
    {
        return view('main/home');
    }


    public function aboutpage()
    {
        return view('main.aboutpage');
    }


    public function eventcatalog()
    {
        return view('main.eventcatalog');
    }


    public function membershippage()
    {
     return view('main.membershippage'); // Ensure the correct path
    }


    // public function contact()
    // {
    //     return view('contact');
    // }


    public function files()
    {
        return view('main.files');
    }

    public function editProfile()
    {
        return view('main.editprofile');
    }

    public function eventpages()
    {
        return view('main.eventpages');
    }

    //For Admins
    // public function dashboard_analytics()
    // {
    //     return view('admin.dashboard_analytics');
    // }

    // public function dashboard_users()
    // {
    //     return view('admin.dashboard_users');
    // }

    
}
