<template>
    <div class="item">
        <div class="flip">
            <div class="front">
                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+movie.poster_path" v-bind:alt="movie.title">
            </div>
            <div class="back">
                <h5>{{movie.title}}</h5>
                <p class="d-none d-md-block">{{movie.overview.slice(0, 70)}}...</p>
                <router-link v-bind:to="{ name: 'movie-details', params: { id: movie.id } }" class="btn btn-sm btn-secondary">Read more</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "popularMovItems",
        props: ['movie']
    }
</script>
<style scoped>

</style>
