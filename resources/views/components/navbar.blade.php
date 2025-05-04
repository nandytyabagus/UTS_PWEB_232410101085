<header class=" flex justify-between px-10 p-6 shadow items-center">
    <div class="">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-12 h-12">
    </div>
    <nav class="space-x-2 text-lg">
        <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
        <x-nav-link href="/pengelolaan" :active="request()->is('pengelolaan')">Pengelolaan</x-nav-link>
        <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
    </nav>
    <div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-1 font-semibold text-lg cursor-pointer">
                Logout
                <x-eva-log-out class="w-6 h-6" />
            </button>
        </form>
    </div>

</header>
