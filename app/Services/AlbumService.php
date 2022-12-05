<?php

namespace App\Services;

use App\Models\Artist;

class AlbumService
{
    public function getByArtist(int $artistId)
    {
        $albums = Artist::find($artistId)->albums;
        return $albums;
    }
}
