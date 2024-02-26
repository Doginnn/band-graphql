<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Lyric;
use App\Models\Music;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Cria 10 álbuns
        $albums = Album::factory(10)->create();

        // Para cada álbum, cria 3 músicas associadas
        $albums->each(function ($album) {
            $musics = Music::factory(3)->create(['album_id' => $album->id]);

            // Para cada música, cria uma letra associada
            $musics->each(function ($music) {
                $music->lyric()->save(Lyric::factory()->create());
            });
        });
    }
}
