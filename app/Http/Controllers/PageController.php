<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    private $users = [
        [
            'id' => '1',
            'username' => 'bagus',
            'password' => 'bagus123',
            'nama' => 'Bagus Putranto',
        ],
        [
            'id' => '2',
            'username' => 'agus',
            'password' => 'agus123',
            'nama' => 'Bagus Putranto',
        ]
    ];

    private $activitys = [
        [
            'id' => '1',
            'Jumlah' => 30000,
            'waktu' => '2025-02-24 02:36:22',
            'type' => 'pengeluaran',
        ],
        [
            'id' => '1',
            'Jumlah' => 10000,
            'waktu' => '2025-02-24 02:36:22',
            'type' => 'pemasukan',
        ],
        [
            'id' => '1',
            'Jumlah' => 150000,
            'waktu' => '2025-05-01 10:00:00',
            'type' => 'pemasukan',
        ],
        [
            'id' => '1',
            'Jumlah' => 70000,
            'waktu' => '2025-05-01 12:00:00',
            'type' => 'pemasukan',
        ],
        [
            'id' => '2',
            'Jumlah' => 20000,
            'waktu' => '2025-05-01 14:00:00',
            'type' => 'pengeluaran',
        ],
        [
            'id' => '2',
            'Jumlah' => 50000,
            'waktu' => '2025-05-02 09:30:00',
            'type' => 'pengeluaran',
        ],
        [
            'id' => '2',
            'Jumlah' => 120000,
            'waktu' => '2025-05-02 11:15:00',
            'type' => 'pemasukan',
        ],
        [
            'id' => '1',
            'Jumlah' => 35000,
            'waktu' => '2025-05-02 13:20:00',
            'type' => 'pengeluaran',
        ],
        [
            'id' => '2',
            'Jumlah' => 80000,
            'waktu' => '2025-05-02 15:45:00',
            'type' => 'pemasukan',
        ],
        [
            'id' => '2',
            'Jumlah' => 25000,
            'waktu' => '2025-05-02 17:00:00',
            'type' => 'pengeluaran',
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
                Session::put('user', ['id' => $user['id'],'username' => $user['username'],'nama' => $user['nama'],'lastLogin' => now()
                ]);;
                return redirect()->route('dashboard');
            }
        }
        return back();
    }

    public function logout()
    {
        Session::flash('user');
        return redirect()->route('showlogin');
    }


    // Dashboard //
    public function showDashboard()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
    
        $today = date('Y-m-d');
        $pemasukanHariIni = 0;
        $pengeluaranHariIni = 0;
    
        $userId = Session::get('user')['id'];
        foreach ($this->activitys as $activity) {
            if ($activity['id'] === $userId) 
            {
            $tanggalAktivitas = date('Y-m-d', strtotime($activity['waktu']));
            if ($tanggalAktivitas === $today) 
            {
            if ($activity['type'] === 'pemasukan') 
                {
                $pemasukanHariIni += $activity['Jumlah'];
                } 
                elseif ($activity['type'] === 'pengeluaran') 
                {
                $pengeluaranHariIni += $activity['Jumlah'];
            }
        }
    }
}

    
        return view('dashboard', ['nama' => Session::get('user')['nama'],'pemasukan' => $pemasukanHariIni,'pengeluaran' => $pengeluaranHariIni,
        ]);
    }    


    // Pengelolaan //
    public function showPengelolaan()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }

        $userId = Session::get('user')['id'];
        
        $userActivitys = array_filter($this->activitys, function ($activity) use ($userId) {
            return $activity['id'] === $userId;
        });

    return view('pengelolaan', ['activitys' => $userActivitys]);

    }

    public function hasilPengelolaan(Request $request)
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }

        $userId = Session::get('user')['id'];
        $activitys = collect($this->activitys)->where('id', $userId)->values()->all();;

        $totalPemasukan = 0;
        $totalPengeluaran = 0;

        foreach ($activitys as $activity) {
            if ($activity['type'] === 'pemasukan') {
                $totalPemasukan += $activity['Jumlah'];
            } elseif ($activity['type'] === 'pengeluaran') {
                $totalPengeluaran += $activity['Jumlah'];
            }
        }

        $selisih = $totalPemasukan - $totalPengeluaran;

        return view('pengelolaan', ['activitys' => $activitys,'totalPemasukan' => $totalPemasukan,'totalPengeluaran' => $totalPengeluaran,'selisih' => $selisih
        ]);
    }


    // Profile //
    public function showProfile()
    {
        if (!Session::has('user')) {
            return redirect()->route('showlogin');
        }
        return view('profile', ['user' => Session::get('user')]);
    }
}