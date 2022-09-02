<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class EventsTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(500);
    }

    public function test_checkIfEventsAreListedInJsonFile() {
        Event::factory(2)->create();
        $response = $this->get(route('eventsApi'));
        $response->assertStatus(200)
        ->assertJsonCount(2);

    }

    public function test_checkIfEventsAreDeletedInJsonFile() {
        Event::factory(2)->create();
        $response = $this->get(route('eventsApi'));
        $response->assertStatus(200)
        ->assertJsonCount(2);
        $response = $this->delete(route('destroyEventApi', 1));
        $response = $this->get(route('eventsApi'));
        $response->assertStatus(200)
        ->assertJsonCount(1);
    }
}
