@props(['id'])

<header class="flex justify-between px-10 p-6 shadow items-center bg-white">
    <div>
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-12 h-12">
    </div>

    <nav class="space-x-2 text-lg">
        <x-nav-link href="{{ route('dashboard', ['id' => $id]) }}" :active="request()->is('dashboard/' . $id)">
            Dashboard
        </x-nav-link>

        <x-nav-link href="{{ route('pengelolaan', ['id' => $id]) }}" :active="request()->is('pengelolaan/' . $id)">
            Pengelolaan
        </x-nav-link>

        <x-nav-link href="{{ route('profile', ['id' => $id]) }}" :active="request()->is('profile/' . $id)">
            Profile
        </x-nav-link>
    </nav>

    <div>
        <a href="{{ route('showlogin') }}"
            class="flex items-center gap-1 font-semibold text-lg cursor-pointer text-red-600">
            Logout
            <x-eva-log-out class="w-6 h-6" />
        </a>
    </div>
</header>
