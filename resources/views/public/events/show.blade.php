@extends('layouts.public')

@section('title', 'Detail Event')

@section('content')
    @php
        // Data contoh (ganti dengan data dari database nanti)
        $event = [
            'id'          => $id ?? 1,
            'name'        => 'Seminar Nasional Teknologi',
            'location'    => 'Aula Utama',
            'start_date'  => '20 Nov 2026',
            'end_date'    => '21 Nov 2026',
            'organizer'   => 'Himpunan Mahasiswa Informatika',
            'price'       => 'Rp 50.000',
            'description' => 'Seminar dua hari yang membahas perkembangan teknologi terbaru, menghadirkan pembicara dari industri dan akademisi. Peserta akan mendapatkan sertifikat dan materi lengkap.',
        ];
    @endphp

    <a href="{{ route('public.events.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Kembali ke daftar event</a>

    <div class="mt-4 grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- Kolom kiri: banner + deskripsi --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="h-64 rounded-lg bg-gradient-to-br from-indigo-400 to-purple-500"></div>

            <div class="rounded-lg bg-white p-6 shadow">
                <h1 class="text-2xl font-bold">{{ $event['name'] }}</h1>
                <p class="mt-1 text-sm text-gray-500">Diselenggarakan oleh {{ $event['organizer'] }}</p>

                <h2 class="mt-6 font-semibold">Deskripsi</h2>
                <p class="mt-2 text-sm leading-relaxed text-gray-600">{{ $event['description'] }}</p>
            </div>
        </div>

        {{-- Kolom kanan: info + tombol daftar --}}
        <aside class="space-y-4">
            <div class="rounded-lg bg-white p-6 shadow">
                <dl class="space-y-3 text-sm">
                    <div>
                        <dt class="text-gray-500">Lokasi</dt>
                        <dd class="font-medium">{{ $event['location'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">Tanggal Mulai</dt>
                        <dd class="font-medium">{{ $event['start_date'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">Tanggal Selesai</dt>
                        <dd class="font-medium">{{ $event['end_date'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">Harga Tiket</dt>
                        <dd class="text-lg font-semibold text-indigo-600">{{ $event['price'] }}</dd>
                    </div>
                </dl>

                <a href="#" class="mt-5 block w-full rounded-md bg-indigo-600 py-2.5 text-center text-sm font-medium text-white hover:bg-indigo-700">
                    Daftar / Beli Tiket
                </a>
            </div>
        </aside>
    </div>
@endsection