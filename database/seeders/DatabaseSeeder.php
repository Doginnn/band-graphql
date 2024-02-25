<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Album;
use App\Models\Lyric;
use App\Models\Music;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 10 álbuns
        $albums = Album::factory(10)->create();

        // Para cada álbum, cria 3 músicas associadas
        $albums->each(function ($album) {
            $album->musics()->saveMany(Music::factory(3)->make());
        });

        // Para cada música, cria uma letra associada
        Music::all()->each(function ($music) {
            $music->lyric()->save(Lyric::factory()->make());
        });
    }
}
