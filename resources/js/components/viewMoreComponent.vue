<template>
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 p-1 p-md-3" v-bind:key="more.id" v-for="more in viewMore">
                <div class="item bg-dark">
                    <router-link v-if="type==='latestMovies'||type==='popularMovies'" v-bind:to="{ name: 'movie-details', params: { id: more.id } }" class="text-decoration-none">
                        <div class="flip">
                            <div class="front">
                                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+more.poster_path" v-bind:alt="more.name">
                            </div>
                            <div class="back">
                                <h5>{{more.name}}</h5>
                                <p>Click the link bellow to learn more about the movie.</p>
                            </div>
                        </div>
                    </router-link>
                    <router-link v-if="type==='airingToday' || type==='popularTvShows'" v-bind:to="{ name: 'tv-details', params: { id: more.id } }" class="text-decoration-none">
                        <div class="flip">
                            <div class="front">
                                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+more.poster_path" v-bind:alt="more.name">
                            </div>
                            <div class="back">
                                <h5>{{more.name}}</h5>
                                <p>Click the link bellow to learn more about the movie.</p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "viewMoreComponent",
        props: ['viewMore', 'type']
    }
</script>

<style scoped>

</style>
