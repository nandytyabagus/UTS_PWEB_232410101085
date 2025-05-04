@extends('layout.app')

@section('content')
    <main class="py-10 flex justify-center items-center bg-gray-300 h-[86.7vh]">
        <div class="w-full max-w-xl bg-white shadow-md rounded-xl p-6">
            <h2 class="text-2xl font-semibold text-center mb-6">
                Selamat Datang {{ $nama }}
            </h2>

            <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="text-lg font-bold mb-4">Aktivitas Hari Ini</h3>
                <div class="space-y-2 text-gray-800">
                    <p>
                        <span class="font-medium">Pemasukan:</span>
                        Rp {{ number_format($pemasukan, 0, ',', '.') }}
                    </p>
                    <p>
                        <span class="font-medium">Pengeluaran:</span>
                        Rp {{ number_format($pengeluaran, 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
