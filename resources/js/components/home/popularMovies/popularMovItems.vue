<template>
    <div class="item">
        <router-link v-bind:to="{ name: 'movie-details', params: { id: movie.id } }">
            <div class="flip">
                <div class="front">
                    <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+movie.poster_path" v-bind:alt="movie.title">
                </div>
                <div class="back">
                    <h5>{{movie.title}}</h5>
                    <p class="d-none d-md-block">Click to know more...</p>
                </div>
            </div>
        </router-link>
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
