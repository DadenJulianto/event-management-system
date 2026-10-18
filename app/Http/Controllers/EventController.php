<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = $this->eventList();

        return view('public.events.index', compact('events'));
    }

    public function dashboardIndex()
    {
        $events = $this->eventList();

        return view('dashboard.eo.events.index', compact('events'));
    }

    private function eventList()
    {
        return collect(session('events', []))
            ->map(function ($event, $id) {
                $startDate = Carbon::parse($event['start_date']);
                $endDate = Carbon::parse($event['end_date']);
                $today = today();

                return (object) [
                    'id'         => $id,
                    'name'       => $event['name'],
                    'location'   => $event['location'],
                    'start_date' => $startDate,
                    'end_date'   => $endDate,
                    'status'     => $endDate->lt($today)
                        ? 'Selesai'
                        : ($startDate->gt($today) ? 'Akan datang' : 'Berlangsung'),
                ];
            });
    }

    public function dashboardShow(int $id)
    {
        $event = $this->eventList()->firstWhere('id', $id);

        abort_if($event === null, 404);

        return view('dashboard.eo.events.show', compact('event'));
    }

    public function create()
    {
        $events = session('events', []);
        return view('dashboard.eo.events.create', compact('events'));
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
            ->route('dashboard.eo.events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function destroy(int $id)
    {
        $events = session('events', []);
        if (isset($events[$id])) {
            unset($events[$id]);
            session(['events' => array_values($events)]); // Reindex the array
            return redirect()
                ->route('dashboard.eo.events.index')
                ->with('success', 'Event berhasil dihapus.');
        }

        return redirect()
            ->route('dashboard.eo.events.index')
            ->with('error', 'Event tidak ditemukan.');
    }
}