<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'=> $this->faker->sentence,
            'duration' => $this->faker->randomNumber(2),
            'album_id' => Album::factory()->create()->id
        ];
    }
}
