<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Popular TV Shows</h2>
                <div class="owl-popularTV owl-carousel owl-theme">
                    <div class="owl-carousel-item" v-bind:key="popularTVShow.id" v-for="popularTVShow in popularTVShows">
                        <popularTVShowsItem v-bind:tv="popularTVShow"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import popularTVShowsItem from './popularTVShowsItems';

    export default {
        name: "PopularTvShows",
        props: ['popularTVShows'],
        components: {
            popularTVShowsItem
        }
    }
</script>
