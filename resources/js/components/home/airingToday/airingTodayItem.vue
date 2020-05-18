<template>
    <div class="item">
        <div class="flip">
            <div class="front">
                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+tv.poster_path" v-bind:alt="tv.name">
            </div>
            <div class="back">
                <h5>{{tv.name}}</h5>
                <p class="d-none d-md-block">{{tv.overview.slice(0, 70)}}...</p>
                <router-link v-bind:to="{ name: 'tv-details', params: { id: tv.id } }" class="btn btn-sm btn-secondary">Read more</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "airingTodayItem",
        props: ['tv']
    }
</script>

<style scoped>

</style>
