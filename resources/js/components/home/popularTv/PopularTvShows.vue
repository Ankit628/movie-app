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
                <router-link v-bind:to="{name:'more',params:{type:'popularTvShows',page:1}}" class="btn btn-lg btn-link float-right text-success">View More...</router-link>
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
