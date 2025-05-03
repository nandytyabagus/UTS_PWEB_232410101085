<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showDashboard()
    {
        return view('dashboard');
    }

    public function showPengelolaan()
    {
        return view('pengelolaan');
    }
    
    public function showProfile()
    {
        return view('profile');
    }
    
    public function showRegister()
    {
        return view('register');
    }
}