<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Services\AlbumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function create()
    {
     return response()->view('createAlbum');
    }

    public function store(Request $request, Album $album)
    {
        $data=$request->all();
        $data['image']=$request->image->store('pubic');
        $data['artist_id'] = $request->artistId;
        $album->create($data);
        return response(['status'=>true]);
    }

    public function get(Request $request, AlbumService $albumService)
    {
        return response(['albums'=> $albumService->getByArtist($request->artistId)]);
    }


}
