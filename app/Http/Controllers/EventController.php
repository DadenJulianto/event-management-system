<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Ubah array di session jadi object supaya view tidak perlu diubah banyak
        $events = collect(session('events', []))
            ->map(fn ($e) => (object) [
                'name'       => $e['name'],
                'location'   => $e['location'],
                'start_date' => Carbon::parse($e['start_date']),
                'end_date'   => Carbon::parse($e['end_date']),
            ]);

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $events = session('events', []);
        return view('events.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ], [
            'name.required'           => 'Nama event wajib diisi.',
            'location.required'       => 'Lokasi wajib diisi.',
            'start_date.required'     => 'Tanggal mulai wajib diisi.',
            'start_date.date'         => 'Tanggal mulai tidak valid.',
            'end_date.required'       => 'Tanggal selesai wajib diisi.',
            'end_date.date'           => 'Tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
        ]);

        // Simpan sementara ke session
        $events = session('events', []);
        $events[] = $validated;
        session(['events' => $events]);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }
}