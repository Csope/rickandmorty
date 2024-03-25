<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Character;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EpisodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $characters = [
           // URLs of characters for episode 41
           "https://rickandmortyapi.com/api/character/1",
           "https://rickandmortyapi.com/api/character/2",
           "https://rickandmortyapi.com/api/character/3",
           "https://rickandmortyapi.com/api/character/4",
           "https://rickandmortyapi.com/api/character/5",
           "https://rickandmortyapi.com/api/character/107",
           "https://rickandmortyapi.com/api/character/344",
           "https://rickandmortyapi.com/api/character/592",
           "https://rickandmortyapi.com/api/character/667",
           "https://rickandmortyapi.com/api/character/668",
           "https://rickandmortyapi.com/api/character/669",
           "https://rickandmortyapi.com/api/character/670",
           "https://rickandmortyapi.com/api/character/671"
       ];

       // Extracted data from the JSON
       $episodeData = [
            'id' => 41,
            'name' => 'Star Mort: Rickturn of the Jerri',
            'air_date' => '2020-05-31',
            'episode' => 'S04E10',
            'characters' => $characters,
            'url' => 'https://rickandmortyapi.com/api/episode/41',
            'created_at' => now(),
            'updated_at' => now()
        ];

        // Insert episode into the database
        $episode = Episode::updateOrCreate(['id' => $episodeData['id']], $episodeData);

        // Associate characters with the episode
        foreach ($characters as $characterUrl) {
            // Extract character ID from the URL
            $characterId = intval(substr($characterUrl, strrpos($characterUrl, '/') + 1));

            // Find the character based on its ID
            $character = Character::updateOrCreate(['id' => $characterId]);

            // Attach the character to the episode
            $episode->characters()->syncWithoutDetaching([$character->id]);
        }


    }
}
