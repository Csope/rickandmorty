<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name",
        "air_date",
        "episode"
    ];
    /**
     * The characters that belong to the episode.
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'episode_character', 'episode_id', 'character_id');
    }
}
