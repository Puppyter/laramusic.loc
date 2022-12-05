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

Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::resource('user',UserController::class);
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::post('/register',[LoginController::class,'registration'])->name('register');
Route::get('/{id}/homepage',[UserController::class,'show'])->name('homepage');
/**
 * Tracks creation routes
 */

Route::get('/album/create',[AlbumController::class,'create'])->name('albumsCreate');
Route::post('/album/store',[AlbumController::class,'store'])->name('albumsStore');
Route::post('/album/get',[AlbumController::class,'get'])->name('albumsGet');
Route::get('/artist/create',[ArtistController::class,'create'])->name('artistsCreate');
Route::post('/artist/store',[ArtistController::class,'store'])->name('artistsStore');
//Route::get('/artist/show',[ArtistController::class]);
Route::get('/artist',[ArtistController::class,'index'])->name('artistsShow');
Route::get('/genre/create',[GenreController::class,'create'])->name('createGenre');
Route::get('/genre/get',[GenreController::class,'getAll'])->name('allGenres');
Route::post('/genre/store/',[GenreController::class,'store'])->name('genreStore');
Route::get('/song/create/', [SongController::class,'create'])->name('songCreate');
Route::post('/song/store/', [SongController::class,'store'])->name('songStore');
Route::get('/song/show/',[SongController::class,'index'])->name('songs');
Route::get('/song/mix',[SongController::class,'mixGet']);
Route::get('/track/get',[SongController::class,'get']);
