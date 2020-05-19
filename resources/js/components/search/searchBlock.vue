<template>
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 p-1 p-md-3" v-bind:key="search.id" v-for="search in searches">
                <div class="item bg-dark text-white">
                    <router-link v-if="search.media_type==='movie'" v-bind:to="{ name: 'movie-details', params: { id: search.id } }">
                        <div class="flip">
                            <div class="front">
                                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+search.poster_path" v-bind:alt="search.name">
                            </div>
                            <div class="back">
                                <h5>{{search.name}}</h5>
                                <p>Click the link bellow to learn more about the movie.</p>
                            </div>
                        </div>
                    </router-link>
                    <router-link v-if="search.media_type==='tv'" v-bind:to="{ name: 'tv-details', params: { id: search.id } }">
                        <div class="flip">
                            <div class="front">
                                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+search.poster_path" v-bind:alt="search.name">
                            </div>
                            <div class="back">
                                <h5>{{search.name}}</h5>
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
        name: "searchBlock",
        props: ["searches"]
    }
</script>

<style scoped>

</style>
