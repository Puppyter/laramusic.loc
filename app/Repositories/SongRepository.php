<?php

namespace App\Repositories;

use App\Models\Song;

class SongRepository
{
    public function createMixByGenre(Song $song)
    {
        $songs = Song::where('genre_id',$song->genre_id)->get()->random(25);
        $songs[0]=$song;
        return $songs;
    }
}
