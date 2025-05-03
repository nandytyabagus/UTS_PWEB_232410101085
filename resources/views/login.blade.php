@extends('layout.guest')

@section('content')
    <div class="flex justify-center items-center h-screen bg-white">
        <div class="w-full max-w-md bg-white px-8 py-9 rounded-xl shadow-xl space-y-6">
            <h2 class="text-3xl font-semibold text-center">Login</h2>
            <form action="" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="username" class="block text-md font-medium text-gray-700 ml-1">Username</label>
                    <input type="text" name="username" id="username" class="px-4 py-2 rounded-xl border w-full">
                </div>

                <div class="space-y-1">
                    <label for="password" class="block text-md font-medium text-gray-700 ml-1">Password</label>
                    <input type="password" name="password" id="password" class="px-4 py-2 rounded-xl border w-full">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-blue-600">
                    <label for="remember" class="text-sm text-gray-700">Ingat saya</label>
                </div>

                <button type="submit"
                    class="w-full px-4 py-3 text-white bg-blue-500 rounded-xl hover:bg-blue-600 transition">
                    Masuk
                </button>
            </form>
        </div>
    </div>
@endsection
