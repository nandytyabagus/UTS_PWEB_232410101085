@props(['active' => false])

<a class="{{ $active ? 'font-semibold' : 'font-normal' }}" aria-current="{{ $active ? 'page' : false }}"
    {{ $attributes }}>{{ $slot }}</a>
