import Home from './views/Home'
import TVDetails from "./views/Details/TVDetails";
import movieDetails from "./views/Details/movieDetails";
import Search from "./views/Search";
import viewMore from "./views/ViewMore"

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
        path: '/search/:search',
        name: 'Search',
        component: Search,
        props: true
    },
    {
        path: '/more/:type',
        name: 'more',
        component: viewMore,
        props: true
    },
];
