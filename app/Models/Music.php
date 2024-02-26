<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $fillable = [
        'title',
        'duration',
        'album_id'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function lyric()
    {
        return $this->hasOne(Lyric::class);
    }
}
