<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Music;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    protected $model = Music::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->sentence,
            'duration' => $this->faker->randomNumber(2),
            'album_id' => Album::factory()->create()->id
        ];
    }
}
