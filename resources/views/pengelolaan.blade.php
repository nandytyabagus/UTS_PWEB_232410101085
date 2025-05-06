@extends('layout.app')

@section('content')
    <div class="flex justify-center items-center py-10 bg-gray-200">
        <div class="p-6 w-7xl shadow-lg rounded-xl space-y-4 bg-white">
            <h1 class="text-3xl text-center font-semibold">Pengelolaan Aktivitas</h1>
            <h2 class="mt-8 text-xl font-semibold">Daftar Aktivitas</h2>
            <table class="text-left table-auto w-full border">
                <thead>
                    <tr class="bg-gray-200 border-b-1">
                        <th class="px-4 py-3 border-r">Jumlah</th>
                        <th class="px-4 py-3 border-r">Tipe</th>
                        <th class="px-4 py-3">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activitys as $activity)
                        <tr>
                            <td class="px-4 py-3 border-r">Rp {{ number_format($activity['Jumlah'], 0, ',', '.') }}</td>
                            <td class="px-4 py-3 border-r">{{ $activity['type'] }}</td>
                            <td class="px-4 py-3">{{ date('d-m-Y H:i', strtotime($activity['waktu'])) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="text-center">
                <form method="POST" action="{{ route('hitungTotal', ['id' => $id]) }}">
                    @csrf
                    <button type="submit" class="px-4 py-3 bg-amber-600 hover:bg-amber-700 text-white rounded-md">Hitung
                        Total</button>
                </form>
            </div>

            @if (isset($totalPemasukan))
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Total Pemasukan: Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                    </h3>
                    <h3 class="text-lg font-semibold">Total Pengeluaran: Rp
                        {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
                    <h3 class="text-lg font-semibold">Selisih: Rp {{ number_format($selisih, 0, ',', '.') }}</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
