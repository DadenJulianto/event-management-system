@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard Admin')

@section('sidebar')
    <x-sidebar-admin />
@endsection

@section('content')
    @php
        $stats = [
            ['label' => 'Total Pengguna', 'value' => '1.248'],
            ['label' => 'Total Event',    'value' => '86'],
            ['label' => 'Event Aktif',    'value' => '12'],
            ['label' => 'Total Transaksi','value' => 'Rp 24,5 jt'],
        ];
        $latest = [
            ['name' => 'Seminar Nasional Teknologi', 'eo' => 'HMIF',      'status' => 'Aktif'],
            ['name' => 'Workshop Desain UI/UX',      'eo' => 'Komunitas', 'status' => 'Menunggu'],
            ['name' => 'Festival Musik Kampus',      'eo' => 'BEM',       'status' => 'Aktif'],
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
        <div class="border-b border-gray-200 px-5 py-3 font-semibold">Event Terbaru</div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-left text-xs font-semibold uppercase text-gray-600">
                    <tr><th class="px-5 py-3">Nama Event</th><th class="px-5 py-3">Penyelenggara</th><th class="px-5 py-3">Status</th></tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($latest as $row)
                        <tr>
                            <td class="px-5 py-3 font-medium">{{ $row['name'] }}</td>
                            <td class="px-5 py-3">{{ $row['eo'] }}</td>
                            <td class="px-5 py-3">
                                <span class="rounded-full px-2 py-0.5 text-xs {{ $row['status'] === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $row['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection