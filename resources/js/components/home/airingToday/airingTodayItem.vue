<template>
    <div class="item bg-dark">
        <router-link v-bind:to="{ name: 'tv-details', params: { id: tv.id } }" class="text-decoration-none">
            <div class="flip">
                <div class="front">
                    <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+tv.poster_path" v-bind:alt="tv.name">
                    <h6 class="d-block d-sm-none">{{tv.name}}</h6>
                </div>
                <div class="back">
                    <h5 class="d-none d-sm-block">{{tv.name}}</h5>
                    <p>Click to know more...</p>
                </div>
            </div>
        </router-link>
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
