<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Artist extends Model
{
    use HasFactory; use Searchable;

    protected $fillable= [
      'name',
      'image'
    ];

    public function toSearchableArray()
    {
        $artists = $this->toArray();
        $artists = $this->transform($artists);
        $artists['image'] = Storage::url($artists['image']);

        return $artists;
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
