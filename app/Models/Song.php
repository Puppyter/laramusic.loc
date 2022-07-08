<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Song extends Model
{
    use HasFactory; use Searchable;

    protected $fillable = [
        'name',
        'album_id',
        'genre_id',
        'image',
        'track'
    ];

    public function toSearchableArray()
    {
        $songs = $this->toArray();
        $songs = $this->transform($songs);
        $songs['image'] = Storage::url($songs['image']);
        $songs['track'] = Storage::url($songs['track']);

        return $songs;
    }


}
