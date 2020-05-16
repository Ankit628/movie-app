import Home from './views/Home'
import TVDetails from "./views/Details/TVDetails";
import movieDetails from "./views/Details/movieDetails";

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
];
