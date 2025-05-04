<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    private $users = [
        [
            'username' => 'bagus',
            'password' => 'bagus123',
            'nama' => 'Bagus Putranto'
        ],
        [
            'username' => 'agus',
            'password' => 'agus123',
            'nama' => 'Agus Riyadi'
        ],
    ];

    public function showLogin()
    {   
        if(Session::has('user'))
        {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function login(Request $request)
    {  
        $request->validate([
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'harap mengisi username',
                'password.required' => 'harap mengisi password'
            ]);

        foreach ($this->users as $user)
        {
            if($user['username'] === $request->username && $user['password'] === $request->password)
            {
                Session::put('user', ['username' => $user['username'],'nama' => $user['nama'] , 'lastLogin' => now()]);
                return redirect()->route('dashboard');
            }
        }
        return back();
    }

    public function logout()
    {
        Session::remove('user');
        return redirect()->route('showlogin');
    }

    public function showDashboard()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        return view('dashboard', ['nama' => Session::get('user')['nama']]);
    }

    public function showPengelolaan()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        return view('pengelolaan');
    }
    
    public function showProfile()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        return view('profile');
    }
}