<?php

namespace App\Http\Controllers;


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class MovieAppController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('layouts.app');
    }

    /**
     * @return array
     */
    public function nowPlayingMovies()
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json();
    }

    /**
     * @return array
     */
    public function upcomingMovies()
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json();
    }

    /**
     * @return array
     */
    public function popularMovies()
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json();
    }

    /**
     * @return array
     */
    public function latestMovies()
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json();
    }

    /**
     * @return array
     */
    public function popularTVShows()
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json();
    }

    /**
     * @return array
     */
    public function airingToday()
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/airing_today')
            ->json();
    }

    /**
     * @param $id
     * @return array
     */
    public function tvDetails($id)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/' . $id)
            ->json();
    }

    /**
     * @param $id
     * @return array
     */
    public function movieDetails($id)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/' . $id)
            ->json();
    }

    /**
     * @param $id
     * @return array
     */
    public function tvDetailCredits($id)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/credits')
            ->json();
    }

    /**
     * @param $id
     * @return array
     */
    public function movieDetailCredits($id)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '/credits')
            ->json();
    }

    /**
     * @param $id
     * @return array
     */
    public function tvSimilar($id)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/similar')
            ->json();
    }

    /**
     * @param $id
     * @return array
     */
    public function movieSimilar($id)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '/similar')
            ->json();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function search($slug)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/search/multi', [
                'query' => $slug
            ])
            ->json();
    }
}
