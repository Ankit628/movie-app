<template>
    <div class="item">
        <router-link v-bind:to="{ name: 'tv-details', params: { id: tv.id } }">
            <div class="flip">
                <div class="front">
                    <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+tv.poster_path" v-bind:alt="tv.name">
                </div>
                <div class="back">
                    <h5>{{tv.name}}</h5>
                    <p class="d-none d-md-block">Click to know more...</p>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "popularTVShowsItems",
        props: ['tv']
    }
</script>
<style scoped>

</style>
