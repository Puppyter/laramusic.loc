<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Album extends Model
{
    use HasFactory; use Searchable;

    protected $fillable=[
        'name',
        'artist_id',
        'image'
    ];

    public function toSearchableArray()
    {
        $albums = $this->toArray();
        $albums = $this->transform($albums);
        $albums['image'] = Storage::url($albums['image']);

        return $albums;
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
