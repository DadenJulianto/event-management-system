@extends('layouts.public')

@section('title', 'Jelajahi Event')

@section('content')
    <section class="mb-8 overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-700 via-indigo-600 to-violet-600 px-6 py-10 text-white shadow-sm sm:px-10 sm:py-12">
        <div class="max-w-2xl">
            <p class="text-sm font-medium text-indigo-100">Temukan pengalaman baru</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">Jelajahi Event</h1>
            <p class="mt-3 max-w-xl text-sm leading-6 text-indigo-100 sm:text-base">
                Temukan acara menarik di sekitarmu dan catat tanggalnya dari sekarang.
            </p>
        </div>
    </section>

    <section aria-labelledby="event-list-heading">
        <div class="mb-5 flex items-end justify-between gap-4">
            <div>
                <h2 id="event-list-heading" class="text-xl font-semibold text-gray-900">Event mendatang</h2>
                <p class="mt-1 text-sm text-gray-500">Lihat event yang tersedia.</p>
            </div>
            <span class="shrink-0 rounded-full bg-indigo-50 px-3 py-1 text-sm font-medium text-indigo-700">
                {{ $events->count() }} event
            </span>
        </div>

        @if ($events->isNotEmpty())
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($events as $event)
                    <article class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="flex h-36 items-end bg-gradient-to-br from-indigo-500 via-violet-500 to-fuchsia-500 p-5">
                            <span class="inline-flex items-center gap-2 rounded-full bg-white/95 px-3 py-1.5 text-xs font-semibold text-indigo-700 shadow-sm">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <rect x="3.5" y="5" width="17" height="16" rx="2" />
                                    <path stroke-linecap="round" d="M7.5 3v4M16.5 3v4M3.5 10h17" />
                                </svg>
                                {{ $event->start_date->format('d/m/Y') }}
                            </span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $event->name }}</h3>
                            <div class="mt-3 flex items-start gap-2 text-sm text-gray-500">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-indigo-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.5 7-11a7 7 0 1 0-14 0c0 6.5 7 11 7 11Z" />
                                    <circle cx="12" cy="10" r="2.3" />
                                </svg>
                                <span>{{ $event->location }}</span>
                            </div>
                            @if ($event->end_date->format('Y-m-d') !== $event->start_date->format('Y-m-d'))
                                <p class="mt-2 text-xs text-gray-400">
                                    Berlangsung sampai {{ $event->end_date->format('d/m/Y') }}
                                </p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-xl border border-dashed border-gray-300 bg-white px-6 py-14 text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <rect x="3.5" y="5" width="17" height="16" rx="2" />
                        <path stroke-linecap="round" d="M7.5 3v4M16.5 3v4M3.5 10h17" />
                    </svg>
                </div>
                <h3 class="mt-4 font-medium text-gray-900">Belum ada event</h3>
                <p class="mt-1 text-sm text-gray-500">Event yang tersedia akan muncul di halaman ini.</p>
            </div>
        @endif
    </section>
@endsection
