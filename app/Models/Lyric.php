<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyric extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'music_id'
    ];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }
}
