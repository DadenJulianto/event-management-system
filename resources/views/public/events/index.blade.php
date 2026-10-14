@extends('layouts.public')

@section('title', 'Daftar Event')

@section('content')
    @php
        // Data contoh (ganti dengan data dari database nanti)
        $events = [
            ['id' => 1, 'name' => 'Seminar Nasional Teknologi', 'location' => 'Aula Utama',      'date' => '20 Nov 2026'],
            ['id' => 2, 'name' => 'Workshop Desain UI/UX',      'location' => 'Ruang Kreatif',   'date' => '25 Nov 2026'],
            ['id' => 3, 'name' => 'Festival Musik Kampus',      'location' => 'Lapangan Barat',  'date' => '02 Des 2026'],
            ['id' => 4, 'name' => 'Pameran Karya Mahasiswa',    'location' => 'Galeri Seni',     'date' => '10 Des 2026'],
            ['id' => 5, 'name' => 'Lomba Coding 24 Jam',        'location' => 'Lab Komputer',    'date' => '15 Des 2026'],
            ['id' => 6, 'name' => 'Bakti Sosial Akhir Tahun',   'location' => 'Balai Desa',      'date' => '28 Des 2026'],
        ];
    @endphp

    {{-- Judul + pencarian --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold">Jelajahi Event</h1>
            <p class="text-sm text-gray-500">Temukan event yang akan datang dan daftar sekarang.</p>
        </div>
        <form action="#" method="GET" class="flex gap-2">
            <input type="text" name="q" placeholder="Cari event..."
                   class="w-full sm:w-64 rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
            <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Cari</button>
        </form>
    </div>

    {{-- Grid kartu event --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($events as $event)
            <a href="{{ route('public.events.show', $event['id']) }}"
               class="group overflow-hidden rounded-lg bg-white shadow hover:shadow-md transition">
                <div class="h-40 bg-gradient-to-br from-indigo-400 to-purple-500"></div>
                <div class="p-4">
                    <p class="text-xs font-medium text-indigo-600">{{ $event['date'] }}</p>
                    <h2 class="mt-1 font-semibold group-hover:text-indigo-600">{{ $event['name'] }}</h2>
                    <p class="mt-1 text-sm text-gray-500">{{ $event['location'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection