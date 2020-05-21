<template>
    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 p-1 p-md-3" v-bind:key="filter.id" v-for="filter in filters">
                <div class="item bg-dark">
                    <router-link v-bind:to="{ name: 'movie-details', params: { id: filter.id } }" class="text-decoration-none">
                        <div class="flip">
                            <div class="front">
                                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+filter.poster_path" v-bind:alt="filter.name">
                            </div>
                            <div class="back">
                                <h5>{{filter.name}}</h5>
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
        name: "filterBlock",
        props:['filters']
    }
</script>

<style scoped>

</style>
