@extends('layout.guest')

@section('content')
    <div class="flex justify-center items-center h-screen bg-cover bg-center text-white"
        style="background-image: url('{{ asset('images/bg-login.webp') }}');">
        <div class="w-full max-w-md bg-transparent backdrop-blur-xs px-8 py-9 rounded-xl shadow-xl space-y-6">
            <div class="text-center">
                <h2 class="text-3xl font-semibold">Login</h2>
                <p class="text-lg">Selamat datang</p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="username" class="block text-md font-medium ml-1">Username</label>
                    <input type="text" name="username" id="username"
                        class="px-4 py-2 rounded-xl border w-full @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="password" class="block text-md font-medium ml-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="px-4 py-2 rounded-xl border w-full @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full px-4 py-3 mt-3 text-white bg-amber-600 rounded-xl hover:bg-amber-700 transition">
                    Masuk
                </button>
            </form>
        </div>
    </div>
@endsection
