<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::resource('user',UserController::class);
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout']);

/**
 * Tracks creation routes
 */

Route::get('/album/create',[AlbumController::class,'create']);
Route::post('/album/store',[AlbumController::class,'store']);
Route::post('album/get',[AlbumController::class,'get']);
Route::get('/artist/create',[ArtistController::class,'create']);
Route::post('/artist/store',[ArtistController::class,'store']);
//Route::get('/artist/show',[ArtistController::class]);
Route::get('/artist',[ArtistController::class,'index']);
Route::get('/genre/create',[GenreController::class,'create']);
Route::post('/genre/store',[GenreController::class,'store']);
Route::get('/song/create', [SongController::class,'create']);
Route::post('/song/store', [SongController::class,'store']);
