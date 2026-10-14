@extends('layouts.dashboard')

@section('title', 'Dashboard EO')
@section('page_title', 'Dashboard Event Organizer')

@section('sidebar')
    <x-sidebar-eo />
@endsection

@section('content')
    @php
        $stats = [
            ['label' => 'Event Saya',    'value' => '5'],
            ['label' => 'Tiket Terjual', 'value' => '320'],
            ['label' => 'Total Peserta', 'value' => '298'],
            ['label' => 'Pendapatan',    'value' => 'Rp 16 jt'],
        ];
        $events = [
            ['name' => 'Seminar Nasional Teknologi', 'date' => '20 Nov 2026', 'sold' => '150 / 200'],
            ['name' => 'Workshop Desain UI/UX',      'date' => '25 Nov 2026', 'sold' => '40 / 50'],
        ];
    @endphp

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($stats as $s)
            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">{{ $s['label'] }}</p>
                <p class="mt-1 text-2xl font-semibold">{{ $s['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6 rounded-lg bg-white shadow">
        <div class="flex items-center justify-between border-b border-gray-200 px-5 py-3">
            <span class="font-semibold">Event Mendatang</span>
            <a href="#" class="rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-indigo-700">+ Buat Event</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-left text-xs font-semibold uppercase text-gray-600">
                    <tr><th class="px-5 py-3">Nama Event</th><th class="px-5 py-3">Tanggal</th><th class="px-5 py-3">Tiket Terjual</th></tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($events as $e)
                        <tr>
                            <td class="px-5 py-3 font-medium">{{ $e['name'] }}</td>
                            <td class="px-5 py-3">{{ $e['date'] }}</td>
                            <td class="px-5 py-3">{{ $e['sold'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection