@php
    $link = 'flex items-center px-3 py-2 rounded-md text-sm';
    $on   = 'bg-gray-800 text-white';
    $off  = 'text-gray-300 hover:bg-gray-800 hover:text-white';
@endphp

<div class="flex h-full flex-col">
    <div class="h-14 flex items-center px-4 border-b border-gray-800">
        <span class="font-semibold">Event Organizer</span>
    </div>

    <nav class="flex-1 overflow-y-auto p-3 space-y-1">
        <a href="{{ route('dashboard.eo') }}" class="{{ $link }} {{ request()->routeIs('dashboard.eo') ? $on : $off }}">Dashboard</a>
        <a href="#" class="{{ $link }} {{ $off }}">Event Saya</a>
        <a href="#" class="{{ $link }} {{ $off }}">Buat Event</a>
        <a href="#" class="{{ $link }} {{ $off }}">Tiket</a>
        <a href="#" class="{{ $link }} {{ $off }}">Peserta</a>
        <a href="#" class="{{ $link }} {{ $off }}">Staff</a>
    </nav>

    <div class="p-3 border-t border-gray-800">
        <a href="{{ route('public.events.index') }}" class="{{ $link }} {{ $off }}">&larr; Ke Situs Publik</a>
    </div>
</div>