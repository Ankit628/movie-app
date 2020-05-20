<template>
    <div class="item">
        <router-link v-bind:to="{ name: 'movie-details', params: { id: movie.id } }" class="text-decoration-none">
            <div class="flip">
                <div class="front">
                    <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+movie.poster_path" v-bind:alt="movie.title">
                    <h6 class="d-block d-sm-none">{{movie.title}}</h6>
                </div>
                <div class="back">
                    <h5 class="d-none d-sm-block">{{movie.title}}</h5>
                    <p>Click to know more...</p>
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
