<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Movies*/
Route::get('/nowPlayingMovies', 'MovieAppController@nowPlayingMovies');
Route::get('/latestMovies', 'MovieAppController@latestMovies');
Route::get('/upcomingMovies', 'MovieAppController@upcomingMovies');
Route::get('/popularMovies', 'MovieAppController@popularMovies');

/*TV Shows*/
Route::get('/popularTVShows', 'MovieAppController@popularTVShows');
Route::get('/airingToday', 'MovieAppController@airingToday');


/*Details*/
Route::get('details/tv/{id}','MovieAppController@tvDetails');
