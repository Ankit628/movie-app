<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Popular Movies</h2>
                <div class="owl-popularMov owl-carousel owl-theme">
                    <div class="owl-carousel-item" v-bind:key="popularMovie.id" v-for="popularMovie in popularMovies">
                        <popularMovItems v-bind:movie="popularMovie"/>
                    </div>
                </div>
                <router-link v-bind:to="{ name:'more', params:{type:'popularMovies'} }" class="btn btn-lg btn-link float-right text-success">View More...</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import popularMovItems from './popularMovItems'

    export default {
        name: "popularMov",
        props: ['popularMovies'],
        components: {
            popularMovItems
        },
    }
</script>

<style scoped>

</style>
