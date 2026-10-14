@php
    $link = 'flex items-center px-3 py-2 rounded-md text-sm';
    $on   = 'bg-gray-800 text-white';
    $off  = 'text-gray-300 hover:bg-gray-800 hover:text-white';
@endphp

<div class="flex h-full flex-col">
    <div class="h-14 flex items-center px-4 border-b border-gray-800">
        <span class="font-semibold">Staff Event</span>
    </div>

    <nav class="flex-1 overflow-y-auto p-3 space-y-1">
        <a href="{{ route('dashboard.staff') }}" class="{{ $link }} {{ request()->routeIs('dashboard.staff') ? $on : $off }}">Dashboard</a>
        <a href="#" class="{{ $link }} {{ $off }}">Check-in Peserta</a>
        <a href="#" class="{{ $link }} {{ $off }}">Daftar Peserta</a>
        <a href="#" class="{{ $link }} {{ $off }}">Jadwal Tugas</a>
    </nav>

    <div class="p-3 border-t border-gray-800">
        <a href="{{ route('public.events.index') }}" class="{{ $link }} {{ $off }}">&larr; Ke Situs Publik</a>
    </div>
</div>