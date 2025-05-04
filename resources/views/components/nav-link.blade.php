@props(['active' => false])

<a class="{{ $active ? 'bg-amber-700 text-white' : 'text-black' }} px-4 py-3 rounded-xl font-semibold"
    aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>{{ $slot }}</a>
