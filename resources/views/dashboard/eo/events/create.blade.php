@extends('layouts.public')
 
@section('title', 'Tambah Event')
 
@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold">Tambah Event</h1>
            </div>
 
            <form action="{{ route('dashboard.eo.events.store') }}" method="POST" novalidate class="px-6 py-5 space-y-5">
                @csrf
 
                {{-- Nama event --}}
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">
                        Nama Event <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           placeholder="Contoh: Seminar Nasional"
                           class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2
                                  {{ $errors->has('name') ? 'border-red-500 focus:ring-red-300' : 'border-gray-300 focus:ring-indigo-300' }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Lokasi --}}
                <div>
                    <label for="location" class="block text-sm font-medium mb-1">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                           placeholder="Contoh: Aula Utama"
                           class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2
                                  {{ $errors->has('location') ? 'border-red-500 focus:ring-red-300' : 'border-gray-300 focus:ring-indigo-300' }}">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Tanggal --}}
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="start_date" class="block text-sm font-medium mb-1">
                            Tanggal Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                               class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2
                                      {{ $errors->has('start_date') ? 'border-red-500 focus:ring-red-300' : 'border-gray-300 focus:ring-indigo-300' }}">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
 
                    <div>
                        <label for="end_date" class="block text-sm font-medium mb-1">
                            Tanggal Selesai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                               class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2
                                      {{ $errors->has('end_date') ? 'border-red-500 focus:ring-red-300' : 'border-gray-300 focus:ring-indigo-300' }}">
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
 
                {{-- Tombol --}}
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Simpan
                    </button>
                    <a href="{{ route('dashboard.eo.events.index') }}"
                       class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
 