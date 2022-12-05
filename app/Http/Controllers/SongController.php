<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Repositories\SongRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index()
    {
        return response()->view('songs');
    }

    public function create()
    {
        return response()->view('createSong');
    }

    public function store(Request $request, Song $song)
    {
        $data = $request->all();
        $data['image']=$request->file('image')->store('public');
        $data['track'] = $request->file('track')->store('public');
//        return response(['status'=>['image'=>$image,'song'=>$song]]);
        $song->create($data);
        return response(['status'=>true]);
    }

    public function get(Request $request)
    {
        return response(['song'=>Song::find($request->song_id)->track]);
    }

    public function mixGet(Request $request, SongRepository $repository)
    {
        return response(['songs'=>$repository->createMixByGenre(Song::find($request->song_id))]);
    }

}
