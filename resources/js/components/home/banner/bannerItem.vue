<template>
    <div class="item">
        <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/original'+movie.backdrop_path" v-bind:alt="movie.original_title">
        <div class="carousel-caption">
            <h2> {{movie.title}}</h2>
            <h3> Releasing on: {{movie.release_date}} </h3>
            <router-link v-bind:to="{ name: 'movie-details', params: { id: movie.id } }" class="btn btn-sm btn-secondary">Read more</router-link>
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
    h2 {
        font-size: 50px;
    }

    h3 {
        font-size: 40px;
    }
</style>
