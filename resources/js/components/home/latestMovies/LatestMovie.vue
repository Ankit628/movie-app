<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Latest Movies</h2>
                <div class="owl-latestMov owl-carousel owl-theme">
                    <div class="owl-carousel-item" v-bind:key="latestMovie.id" v-for="latestMovie in latestMovies">
                        <latestMovieItems v-bind:movie="latestMovie"/>
                    </div>
                </div>
                <router-link v-bind:to="{ name: 'more', params: { type: 'latestMovies',page:1 } }" class="btn btn-lg btn-link float-right text-success">View more...</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import latestMovieItems from './latestMovieItems'

    export default {
        name: "LatestMovie",
        props: ["latestMovies"],
        components: {
            latestMovieItems
        }
    }
</script>
