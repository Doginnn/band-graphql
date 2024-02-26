<?php

namespace Database\Factories;

use App\Models\Music;
use Illuminate\Database\Eloquent\Factories\Factory;

class LyricFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content'=> $this->faker->paragraph,
            'music_id' => Music::factory()->create()->id
        ];
    }
}
