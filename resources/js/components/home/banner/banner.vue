<template>
    <div id="owlCarousel" class="owl-banner owl-carousel owl-theme">
        <div class="owl-carousel-item" v-bind:key="upcomingMovie.id" v-for="upcomingMovie in movies">
            <bannerItem v-bind:movie="upcomingMovie"/>
        </div>
    </div>
</template>

<script>
    import bannerItem from './bannerItem';

    export default {
        name: "banner",
        props: ['movies'],
        components: {
            bannerItem
        }
    }
</script>

<style scoped>

</style>
