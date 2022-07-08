<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function create()
    {
        return response()->view('createSong');
    }

    public function store(Request $request, Song $song)
    {
        $request['image']=Storage::put('public/images/',$request->image);
        $request['song'] = Storage::put('public/songs/',$request->song);
        $song->create($request->all());
        return response(['status'=>true]);
    }
}
