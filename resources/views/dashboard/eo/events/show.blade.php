@extends('layouts.dashboard')

@section('title', 'Detail Event')
@section('page_title', 'Detail Event')

@section('sidebar')
    <x-sidebar-eo />
@endsection

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('dashboard.eo.events.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
            &larr; Kembali ke daftar event
        </a>

        <section class="mt-4 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="bg-gradient-to-br from-indigo-600 to-violet-600 px-6 py-8 text-white">
                <p class="text-sm font-medium text-indigo-100">Detail event</p>
                <h2 class="mt-2 text-2xl font-semibold">{{ $event->name }}</h2>
            </div>

            <dl class="grid gap-5 p-6 sm:grid-cols-2">
                <div>
                    <dt class="text-sm text-gray-500">Lokasi</dt>
                    <dd class="mt-1 font-medium text-gray-900">{{ $event->location }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Status</dt>
                    <dd class="mt-1 font-medium text-gray-900">{{ $event->status }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Tanggal mulai</dt>
                    <dd class="mt-1 font-medium text-gray-900">{{ $event->start_date->format('d/m/Y') }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-gray-500">Tanggal selesai</dt>
                    <dd class="mt-1 font-medium text-gray-900">{{ $event->end_date->format('d/m/Y') }}</dd>
                </div>
            </dl>
        </section>
    </div>
@endsection