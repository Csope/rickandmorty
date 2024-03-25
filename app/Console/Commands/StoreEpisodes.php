<?php

namespace App\Console\Commands;

use App\Models\Episode;
use App\Models\Character;
use Illuminate\Console\Command;
use BendeckDavid\GraphqlClient\Facades\GraphQL;

class StoreEpisodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-episodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store Rick&Morty episodes to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pageCount = $this->getCount();
        for ($page=1;$page<=$pageCount;$page++) {

            $episodes = $this->getEpisodes($page);
            foreach ($episodes as $episode) {   
                $_episode = Episode::updateOrCreate(['id' => $episode['id']], $episode);
                $this->attachCharacters($_episode, $episode);
                $this->info("Episode ".$_episode->episode." was stored!");
            }
        }

        $this->info('The command was successful!');
    }
    protected function attachCharacters($_episode, $episode) {
        // Find the character based on its ID
        foreach ($episode['characters'] as $character) {     
            $_character = Character::updateOrCreate(['id' => $character['id']], $character);
           
            // Attach the character to the episode
            $_episode->characters()->syncWithoutDetaching([$_character->id]);             
        }
    }
    protected function getCount() {
        $result =  GraphQL::raw('
        query {
            episodes {
            info {
                pages
                count
            }
            }
        }        
        ')
        ->get();

        $this->info(($result['episodes']['info']['count'] ?? 0)." episodes found");
        return $result['episodes']['info']['pages'] ?? 0;
        
    }
    protected function getEpisodes($page) {
        $result = GraphQL::raw("
        query {
            episodes(page: $page) {
            results {
            id
            name
            air_date
            episode
            characters {
                id
                name
                gender
                image
                created
                type
                species
                status
            }
            created
            }
        }
        }        
        ")->get();

        return $result['episodes']['results'] ?? [];
        
    }
  
}
