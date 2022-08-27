<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Event::factory()->create(['name'=>'Evento Real', 'description'=>'Esto es un evento que meto de prueba', 'image'=>'https://th.bing.com/th/id/OIP.-n_BoO-Kla10Euys8wXOxgHaFj?pid=ImgDet&rs=1', 'spaces'=>'7']);
        Event::factory(10)->create();
        User::factory()->create(['name'=>'admin', 'email'=>'admin@admin.com', 'isAdmin'=>true]);
        User::factory()->create(['name'=>'user1', 'email'=>'user1@user.com', 'isAdmin'=>false]);
        // Event::factory()->create(['name'=>'User2', 'email'=>'user2@mail.com']);
    }
}
