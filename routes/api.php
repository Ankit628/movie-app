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
Route::get('/latestMovies/{page}', 'MovieAppController@latestMovies');
Route::get('/upcomingMovies/{page}', 'MovieAppController@upcomingMovies');
Route::get('/popularMovies/{page}', 'MovieAppController@popularMovies');

/*TV Shows*/
Route::get('/popularTvShows/{page}', 'MovieAppController@popularTVShows');
Route::get('/airingToday/{page}', 'MovieAppController@airingToday');


/*Details*/
Route::get('details/tv/{id}', 'MovieAppController@tvDetails');
Route::get('similar/tv/{id}', 'MovieAppController@tvSimilar');
Route::get('details/movie/{id}', 'MovieAppController@movieDetails');
Route::get('similar/movie/{id}', 'MovieAppController@movieSimilar');

/*Credits*/
Route::get('details/tv/{id}/credits', 'MovieAppController@tvDetailCredits');
Route::get('details/movie/{id}/credits', 'MovieAppController@movieDetailCredits');

/*Search*/
Route::get('search/{slug}/{page}', 'MovieAppController@search');

/*Get Genres*/
Route::get('genre/movie', 'MovieAppController@movieGenres');
Route::get('genre/tv', 'MovieAppController@tvGenres');
