@extends('layout.app')

@section('content')
    <main class="py-10 px-4 flex justify-center bg-gray-300 h-[86.7vh]">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-xl p-6 space-y-5">
                <h2 class="text-3xl font-semibold text-center">Profil Anda</h2>
                <div class="space-y-2 text-gray-800 text-lg">
                    <p class="font-medium">Nama: <span class="font-normal"> {{ $nama }}</span></p>
                    <p class="font-medium">Username: <span class="font-normal"> {{ $username }}</span></p>
                    <p class="font-medium">
                        Nomor Hp:
                        <span class="font-normal">
                            {{ substr($no_hp, 0, 4) . '-' . substr($no_hp, 4, 4) . '-' . substr($no_hp, 8) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
