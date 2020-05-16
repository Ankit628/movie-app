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
