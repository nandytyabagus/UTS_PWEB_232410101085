<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $users = [
        [
            'id' => '1', 
            'username' => 'bagus', 
            'password' => 'bagus123', 
            'nama' => 'Bagus Putranto',
            'no_hp'=> '126587865218'
        ],
        [
            'id' => '2', 
            'username' => 'agus', 
            'password' => 'agus123', 
            'nama' => 'Agus Setiawan',
            'no_hp'=> '654547854584'
        ]
    ];

    private $activitys = [
        [
            'id' => '1', 
            'Jumlah' => 30000, 
            'waktu' => 
            '2025-02-24 02:36:22', 
            'type' => 'pengeluaran'],
        [
            'id' => '1', 
            'Jumlah' => 10000, 
            'waktu' => 
            '2025-02-24 02:36:22', 
            'type' => 'pemasukan'],
        [
            'id' => '1', 
            'Jumlah' => 150000,
            'waktu' =>
            '2025-05-01 10:00:00',
            'type' => 'pemasukan'],
        [
            'id' => '1', 
            'Jumlah' => 70000, 
            'waktu' => 
            '2025-05-01 12:00:00', 
            'type' => 'pemasukan'],
        [
            'id' => '2', 
            'Jumlah' => 20000, 
            'waktu' => 
            '2025-05-01 14:00:00', 
            'type' => 'pengeluaran'],
        [
            'id' => '2', 
            'Jumlah' => 50000, 
            'waktu' => 
            '2025-05-02 09:30:00', 
            'type' => 'pengeluaran'],
        [
            'id' => '2', 
            'Jumlah' => 120000,
            'waktu' =>
            '2025-05-02 11:15:00',
            'type' => 'pemasukan'],
        [
            'id' => '1', 
            'Jumlah' => 35000, 
            'waktu' => 
            '2025-05-02 13:20:00', 
            'type' => 'pengeluaran'],
        [
            'id' => '2', 
            'Jumlah' => 80000, 
            'waktu' => 
            '2025-05-02 15:45:00', 
            'type' => 'pemasukan'],
        [
            'id' => '2', 
            'Jumlah' => 25000, 
            'waktu' => 
            '2025-05-02 17:00:00', 
            'type' => 'pengeluaran'],
    ];


    // Login //
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
        [
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'username wajib diisi',
            'password.required' => 'password wajib diisi',
        ]
    );

        foreach ($this->users as $user) {
            if ($user['username'] === $request->username && $user['password'] === $request->password) {
                return redirect()->route('dashboard', ['id' => $user['id'],'nama' => $user['nama']]);
            }
        }

        return back();
    }
    
    public function logout()
    {
        return redirect()->route('showlogin');
    }


    // Dashboard //
    public function showDashboard($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);
        
        if (!$user) {
            return redirect()->route('showlogin');
        }
    
        $nama = $user['nama'];
    
        $today = date('Y-m-d');
        $pemasukanHariIni = 0;
        $pengeluaranHariIni = 0;
    
        foreach ($this->activitys as $activity) {
            if ($activity['id'] === $id) {
                $tanggalAktivitas = date('Y-m-d', strtotime($activity['waktu']));
                if ($tanggalAktivitas === $today) {
                    if ($activity['type'] === 'pemasukan') {
                        $pemasukanHariIni += $activity['Jumlah'];
                    } elseif ($activity['type'] === 'pengeluaran') {
                        $pengeluaranHariIni += $activity['Jumlah'];
                    }
                }
            }
        }
    
        return view('dashboard', ['nama' => $nama,'id' => $id,'pemasukan' => $pemasukanHariIni,'pengeluaran' => $pengeluaranHariIni,]);
    }


    // Pengelolaan //
    public function showPengelolaan($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);

        if (!$user) {
            return redirect()->route('showlogin');
        }

        $nama = $user['nama'];

        $userActivitys = array_filter($this->activitys, fn($a) => $a['id'] === $id);

        return view('pengelolaan', ['activitys' => $userActivitys,'id' => $id,'nama' => $nama]);
    }

    public function hasilPengelolaan($id)
    {
        $activitys = collect($this->activitys)->where('id', $id)->values()->all();
        
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
    
        return view('pengelolaan', ['activitys' => $activitys,'totalPemasukan' => $totalPemasukan,'totalPengeluaran' => $totalPengeluaran,'selisih' => $selisih,'id' => $id,]);
    }


    // Profile //
    public function showProfile($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);
        
        if (!$user) {
            return redirect()->route('showlogin');
        }
    
        $nama = $user['nama'];
        $username = $user['username'];
        $no_hp = $user['no_hp'];
    
        return view('profile', ['id' => $id, 'nama' => $nama, 'username' => $username, 'no_hp' => $no_hp]);
    }    
}