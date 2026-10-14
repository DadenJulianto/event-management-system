@extends('layouts.dashboard')

@section('title', 'Dashboard Staff')
@section('page_title', 'Dashboard Staff')

@section('sidebar')
    <x-sidebar-staff />
@endsection

@section('content')
    @php
        $stats = [
            ['label' => 'Event Hari Ini', 'value' => '1'],
            ['label' => 'Sudah Check-in', 'value' => '86'],
            ['label' => 'Belum Check-in', 'value' => '64'],
        ];
        $participants = [
            ['name' => 'Andi Pratama', 'ticket' => 'TKT-0001', 'checked' => true],
            ['name' => 'Siti Aminah',  'ticket' => 'TKT-0002', 'checked' => false],
            ['name' => 'Budi Santoso', 'ticket' => 'TKT-0003', 'checked' => false],
        ];
    @endphp

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        @foreach ($stats as $s)
            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">{{ $s['label'] }}</p>
                <p class="mt-1 text-2xl font-semibold">{{ $s['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6 rounded-lg bg-white shadow">
        <div class="border-b border-gray-200 px-5 py-3 font-semibold">Check-in Peserta</div>
        <ul class="divide-y divide-gray-100 text-sm">
            @foreach ($participants as $p)
                <li class="flex items-center justify-between px-5 py-3">
                    <div>
                        <p class="font-medium">{{ $p['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ $p['ticket'] }}</p>
                    </div>
                    @if ($p['checked'])
                        <span class="rounded-full bg-green-100 px-2 py-0.5 text-xs text-green-700">Sudah check-in</span>
                    @else
                        <button type="button" class="rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-indigo-700">Check-in</button>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection