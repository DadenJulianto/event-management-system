@extends('layouts.dashboard')

@section('title', 'Dashboard Customer')
@section('page_title', 'Tiket Saya')

{{-- Customer tidak memakai sidebar: layout otomatis tampil tanpa sidebar --}}

@section('content')
    @php
        $tickets = [
            ['event' => 'Seminar Nasional Teknologi', 'date' => '20 Nov 2026', 'code' => 'TKT-0001', 'status' => 'Aktif'],
            ['event' => 'Festival Musik Kampus',      'date' => '02 Des 2026', 'code' => 'TKT-0148', 'status' => 'Menunggu Pembayaran'],
        ];
    @endphp

    <div class="mx-auto max-w-4xl">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Daftar Tiket</h2>
            <a href="{{ route('public.events.index') }}" class="text-sm text-indigo-600 hover:underline">Cari event lain &rarr;</a>
        </div>

        <div class="space-y-4">
            @foreach ($tickets as $t)
                <div class="flex flex-col gap-3 rounded-lg bg-white p-5 shadow sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="font-semibold">{{ $t['event'] }}</p>
                        <p class="text-sm text-gray-500">{{ $t['date'] }} &middot; {{ $t['code'] }}</p>
                    </div>
                    <span class="self-start rounded-full px-3 py-1 text-xs sm:self-auto
                        {{ $t['status'] === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $t['status'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection