<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Artwork;


class ArtworkArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = Artist::all();
        $artworks = Artwork::all();

        // Each artist get 5 artworks (method 1)
        // $artists->each(function($artist) use ($artworks) {$artist->artworks()->attach($artworks);});

        // each artist get artwork id 1 (method 2)
        // $artists->each(function($artist) use ($artworks) {$artist->artworks()->attach($artworks[0]);});
        
        // each artist get 1 artwork. The loop goes to 5 meaning artist id 1 > artwork id 1. If you have more artists then artwork then it doesn't work. (method 3)
        for(
            $i = 0;
            $i < 5;
            $i++

        ){$artists[$i]->Artworks()->attach($artworks[$i]);}
    }
}


