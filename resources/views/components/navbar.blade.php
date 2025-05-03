<header class=" flex justify-between px-10 py-7 shadow">
    <div class="">
        <img src="" alt="logo">
    </div>
    <nav class="space-x-5 text-lg">
        <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
        <x-nav-link href="/pengelolaan" :active="request()->is('pengelolaan')">Pengelolaan</x-nav-link>
        <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
    </nav>
    <div class="">
        profile
    </div>
</header>
