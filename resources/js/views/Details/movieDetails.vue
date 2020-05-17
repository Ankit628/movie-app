<template>
    <div id="movieDetails">
        <movieDetail v-bind:details="Details" v-bind:casts="Casts"/>
    </div>
</template>

<script>
    import axios from 'axios';
    import movieDetail from '../../components/details/movie/movieDetails'

    export default {
        name: "movieDetails",
        props: ['id'],
        components: {
            movieDetail
        },
        data() {
            return {
                Details: [],
                Casts: []
            }
        },
        mounted() {
            $('#wrapper').css('opacity', '0');
            Pace.restart();
        },
        created() {
            axios.get('/api/details/movie/' + this.id)
                .then(res => this.Details = res.data)
                .catch(err => console.log(err));
            axios.get('/api/details/movie/' + this.id + '/credits')
                .then(res => this.Casts = res.data.cast)
                .catch(err => console.log(err))
                .then(function () {
                    jQuery('.owl-movie-casts').owlCarousel({
                        loop: true,
                        margin: 20,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        animateOut: 'fadeOut',
                        dots: false,
                        responsive: {
                            600: {
                                dots: true,
                                items: 4
                            },
                            1000: {
                                items: 6
                            }
                        }
                    });
                });
        },
    }
</script>

<style scoped>

</style>
