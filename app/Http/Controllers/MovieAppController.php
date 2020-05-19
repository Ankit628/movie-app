<?php

namespace App\Http\Controllers;


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
     * @param $page
     * @return array
     */
    public function upcomingMovies($page)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/upcoming', [
                'page' => $page
            ])
            ->json();
    }

    /**
     * @param $page
     * @return array
     */
    public function popularMovies($page)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/popular', [
                'page' => $page
            ])
            ->json();
    }

    /**
     * @param $page
     * @return array
     */
    public function latestMovies($page = 1)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/movie/now_playing', [
                'page' => $page
            ])
            ->json();
    }

    /**
     * @param $page
     * @return array
     */
    public function popularTVShows($page)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/popular', [
                'page' => $page
            ])
            ->json();
    }

    /**
     * @param $page
     * @return array
     */
    public function airingToday($page)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/tv/airing_today', [
                'page' => $page
            ])
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
     * @param $slug
     * @param $page
     * @return array
     */
    public function search($slug, $page)
    {
        return Http::withToken(config('services.tmbd.api_key'))
            ->get('https://api.themoviedb.org/3/search/multi', [
                'query' => $slug,
                'page' => $page
            ])
            ->json();
    }
}
