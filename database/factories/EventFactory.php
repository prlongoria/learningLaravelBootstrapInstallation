<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description'=> $this->faker->realText(),
            'image'=> $this->faker->imageUrl(),
            'spaces'=> $this->faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
        ];
    }
}
