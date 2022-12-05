<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index()
    {
        return response()->view('showArtists');
    }

    public function create()
    {
        return response()->view('createArtist');
    }

    public function store(Request $request, Artist $artist)
    {
        $data=$request->all();
        $data['image']=$request->image->store('public');
        $artist->create($data);
        return response(['status'=>true]);
    }

    public function show()
    {

    }
}
