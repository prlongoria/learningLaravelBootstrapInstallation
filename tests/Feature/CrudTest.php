<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */use RefreshDatabase;
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(500);
    // }
    public function test_list_event_appear_in_homepage() {
        $this-> withExceptionHandling();
        $events = Event::factory(2)->create(); 
        $event = $events[0];
        $response = $this -> get('/');
        $response -> assertStatus(200) 
        -> assertViewIs('home');
        $response -> assertSee($event->name);
    }
    public function test_a_event_can_ba_deleted() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());
        $response = $this->delete(route('delete', $event->id));
        $this->assertCount(0, Event::all());
    }
}
