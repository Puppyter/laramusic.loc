<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    public function create()
    {
        return response()->view('createGenre');
    }

    public function store(Request $request, Genre $genre)
    {
        $genre->create($request->all());
        return response(['status'=>true]);
    }
}
