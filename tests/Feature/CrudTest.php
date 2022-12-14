<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CrudTest extends TestCase
{
    
    use RefreshDatabase;
    
    public function test_list_event_appear_in_homepage() {
        $this-> withExceptionHandling();
        $events = Event::factory(2)->create(); 
        $event = $events[0];
        $response = $this->get('/');
        $response -> assertStatus(200) 
            ->assertViewIs('home');
        $response->assertSee($event->name);
    }
    public function test_a_event_can_be_deleted() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());

        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);
        $response = $this->delete(route('delete', $event->id));
        $this->assertCount(1, Event::all());

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);
        $response = $this->delete(route('delete', $event->id));
        $this->assertCount(0, Event::all());
        
    }
    public function test_a_event_can_be_create() {
        $this-> withExceptionHandling();

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);

        $response = $this->post(route('storeEvent'), [
            'name' => 'new name',
            'description' => 'new description',
            'spaces' => '20',
            'image' => 'new image'
        ]);
        $this->assertCount(1, Event::all());

        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);
        $response = $this->post(route('storeEvent'), [
            'name' => 'new name',
            'description' => 'new description',
            'spaces' => '20',
            'image' => 'new image'
        ]);
        $this->assertCount(1, Event::all());
    }
    public function test_a_event_can_be_update() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this -> assertCount(1, Event::all());

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);
        $response = $this->patch(route('updateEvent', $event->id), [
             'name' => 'updated name',
             'description' => 'updated description',
             'spaces' => '20',
             'image' => 'updated image'
         ]);
         $this->assertEquals('updated name', Event::first()->name);

        $userNoAdmin = User::factory()->create(['isAdmin'=>false]);
        $this->actingAs($userNoAdmin);
        $response = $this->patch(route('updateEvent', $event->id), [
            'name' => 'updated name no admin',
            'description' => 'updated description',
            'spaces' => '20',
            'image' => 'updated image'
        ]);
        $this->assertEquals('updated name', Event::first()->name);
    }
    public function test_a_event_can_be_show() {
        $this-> withExceptionHandling();
        $event = Event::factory()->create();
        $this->assertCount(1, Event::all());
        $response = $this->get(route('showEvent', $event->id));
        $response->assertSee($event->name);
    }
}
