<template>
    <div class="item">
        <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/original'+movie.backdrop_path" v-bind:alt="movie.original_title">
        <div class="carousel-caption text-center">
            <h2> {{movie.title}}</h2>
            <h3> Releasing on: {{movie.release_date}} </h3>
            <router-link v-bind:to="{ name: 'movie-details', params: { id: movie.id } }" class="btn btn-sm btn-link p-0 text-success">Read more</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "bannerItem",
        props: ['movie']
    }
</script>

<style scoped>
    .carousel-caption {
        top: 15%;
        left: 8%;
        background-color: #343a408c;
        border-radius: 10px;
        margin: 0.5rem;
        padding: 0.7rem;
        bottom: 0;
        width: 125px;
        height: 125px;
    }

    h2 {
        font-size: 1.2rem;
    }

    h3 {
        font-size: 1rem;
    }

    @media (min-width: 992px) {
        h2 {
            font-size: 1.5rem;
        }

        .carousel-caption {
            width: 200px;
        }
    }

    @media (min-width: 1200px) {
        .carousel-caption {
            top: 10%;
        }
    }
</style>
