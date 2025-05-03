@extends('layout.app')

@section('content')
    <main class=" flex justify-center items-center py-8 bg-gray-400">
        <div class="shadow-xl rounded-2xl p-6 w-1/2 h-[80vh] bg-white">
            <table class=" w-full">
                <thead class="sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3">Nama Produk</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3">Harga</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </main>
@endsection
