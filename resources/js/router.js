import Home from './views/Home'
import TVDetails from "./views/Details/TVDetails";
import movieDetails from "./views/Details/movieDetails";

export const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/details/Tv/:id',
        component: TVDetails,
        props: true
    },
    {
        path: '/details/movies/:id',
        component: movieDetails,
        props: true
    },
];
