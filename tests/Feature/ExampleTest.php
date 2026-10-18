<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('public.events.index'));
    }

    public function test_create_event_route_opens_the_create_page(): void
    {
        $response = $this->get('/events/create');

        $response->assertOk();
        $response->assertSee('Tambah Event');
        $response->assertSee(route('dashboard.eo.events.store'), false);
    }

    public function test_event_list_displays_events_created_in_the_session(): void
    {
        $response = $this
            ->withSession([
                'events' => [[
                    'name' => 'Seminar Teknologi',
                    'location' => 'Aula Utama',
                    'start_date' => '2026-11-20',
                    'end_date' => '2026-11-21',
                ]],
            ])
            ->get('/events');

        $response->assertOk();
        $response->assertSee('Seminar Teknologi');
        $response->assertSee('Aula Utama');
        $response->assertSee('20/11/2026');
    }

    public function test_event_owner_list_shows_status_and_working_detail_action(): void
    {
        $event = [
            'name' => 'Seminar Teknologi',
            'location' => 'Aula Utama',
            'start_date' => today()->addDays(2)->toDateString(),
            'end_date' => today()->addDays(2)->toDateString(),
        ];

        $response = $this
            ->withSession(['events' => [$event]])
            ->get('/dashboard/eo/events');

        $response->assertOk();
        $response->assertSee('Status');
        $response->assertSee('Aksi');
        $response->assertSee('Akan datang');
        $response->assertSee(route('dashboard.eo.events.show', 0), false);

        $this->withSession(['events' => [$event]])
            ->get(route('dashboard.eo.events.show', 0))
            ->assertOk()
            ->assertSee('Seminar Teknologi');
    }
}
