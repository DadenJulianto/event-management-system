@extends('layouts.dashboard')

@section('title', 'Event Saya')
@section('page_title', 'Event Saya')

@section('sidebar')
    <x-sidebar-eo />
@endsection

@section('content')
    <div class="mx-auto max-w-6xl">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Daftar Event</h2>
                <p class="mt-1 text-sm text-gray-500">Kelola event yang sudah Anda buat.</p>
            </div>
            <a href="{{ route('dashboard.eo.events.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span aria-hidden="true">+</span>
                Buat Event
            </a>
        </div>

        <section class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4">
                <h3 class="font-semibold text-gray-900">Event Saya</h3>
                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700">
                    {{ $events->count() }} event
                </span>
            </div>

            @if ($events->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                <th scope="col" class="px-5 py-3">Event</th>
                                <th scope="col" class="px-5 py-3">Tanggal</th>
                                <th scope="col" class="px-5 py-3">Status</th>
                                <th scope="col" class="px-5 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @foreach ($events as $event)
                                <tr class="text-sm">
                                    <td class="px-5 py-4">
                                        <p class="font-medium text-gray-900">{{ $event->name }}</p>
                                        <p class="mt-1 text-gray-500">{{ $event->location }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-5 py-4 text-gray-600">
                                        <p>{{ $event->start_date->format('d/m/Y') }}</p>
                                        @if ($event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d'))
                                            <p class="mt-1 text-xs text-gray-400">sampai {{ $event->end_date->format('d/m/Y') }}</p>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-5 py-4">
                                        @php
                                            $statusClasses = match ($event->status) {
                                                'Berlangsung' => 'bg-green-50 text-green-700 ring-green-600/20',
                                                'Selesai' => 'bg-gray-100 text-gray-600 ring-gray-500/20',
                                                default => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                                            };
                                        @endphp
                                        <span class="inline-flex rounded-full px-2.5 py-1 text-xs font-medium ring-1 ring-inset {{ $statusClasses }}">
                                            {{ $event->status }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-5 py-4 text-right">
                                        <a href="{{ route('dashboard.eo.events.show', $event->id) }}"
                                           class="inline-flex items-center rounded-md border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700">
                                            Lihat detail
                                        </a>
                                         <form action="{{ route('dashboard.eo.events.delete', $event->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center rounded-md border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-6 py-14 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <rect x="3.5" y="5" width="17" height="16" rx="2" />
                            <path stroke-linecap="round" d="M7.5 3v4M16.5 3v4M3.5 10h17" />
                        </svg>
                    </div>
                    <h4 class="mt-4 font-medium text-gray-900">Belum ada event</h4>
                    <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat event pertama Anda.</p>
                    <a href="{{ route('dashboard.eo.events.create') }}"
                       class="mt-5 inline-flex rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Buat Event
                    </a>
                </div>
            @endif
        </section>
    </div>
@endsection