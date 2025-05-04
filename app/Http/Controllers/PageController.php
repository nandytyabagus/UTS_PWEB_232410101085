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
            'nama' => 'Bagus Putranto',
            'saldo' => 100000,
        ],
        [
            'username' => 'agus',
            'password' => 'agus123',
            'nama' => 'Agus Riyadi',
            'saldo' => 50000, 
        ],
    ];

    private $barang = [
        [
            'id' => 1,
            'nama' => 'Laptop',
            'harga' => 150000,
        ],
        [
            'id' => 2,
            'nama' => 'Smartphone',
            'harga' => 70000,
        ],
        [
            'id' => 3,
            'nama' => 'Headphone',
            'harga' => 20000,
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
                Session::put('user', ['username' => $user['username'],'nama' => $user['nama'] ,'saldo' => $user['saldo'] , 'lastLogin' => now()]);
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


    // Dashboard //
    public function showDashboard()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        return view('dashboard', ['nama' => Session::get('user')['nama']]);
    }


    // Pengelolaan //
    public function showPengelolaan()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        $username = Session::get('user')['username'];
        $catatans = Session::get('catatans.' . $username, []);

        return view('pengelolaan', ['catatans' => $catatans]);
    }
    

    public function Pengelolaan()
    {

    }


    // Profile //
    public function showProfile()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        return view('profile');
    }
}