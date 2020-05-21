import Home from './views/Home'
import TVDetails from "./views/Details/TVDetails";
import movieDetails from "./views/Details/movieDetails";
import Search from "./views/Search";
import viewMore from "./views/ViewMore";
import FilterMovies from "./views/Filters/FilterMovies";
import FilterTv from "./views/Filters/FilterTv";

export const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/TV/:id',
        name: 'tv-details',
        component: TVDetails,
        props: true
    },
    {
        path: '/movie/:id',
        name: 'movie-details',
        component: movieDetails,
        props: true
    },
    {
        path: '/search/:search/:page',
        name: 'Search',
        component: Search,
        props: true
    },
    {
        path: '/more/:type/:page',
        name: 'more',
        component: viewMore,
        props: true
    },
    {
        path: '/filter/movie',
        name: 'filter-movies',
        component: FilterMovies,
        props: (route) => ({
            ids: route.query.ids,
            page: route.query.page
        })
    }, {
        path: '/filter/tv',
        name: 'filter-tv',
        component: FilterTv,
        props: (route) => ({
            ids: route.query.ids,
            page: route.query.page
        })
    },
];
