<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name",
        "status",
        "species",
        "type",
        "gender",
        "image"
    ];

    /**
     * The episodes that belong to the character.
     */
    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'episode_character', 'character_id', 'episode_id');
    }
}
