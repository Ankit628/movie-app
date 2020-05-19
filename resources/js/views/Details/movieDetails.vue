<template>
    <div id="movieDetails">
        <movieDetail v-bind:details="Details" v-bind:casts="Casts" v-bind:similars="Similars" :key="componentKey"/>
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
                Casts: [],
                Similars: [],
                componentKey: 0
            }
        },
        created() {
            this.fetchData(this.id);
        },
        watch: {
            $route(to, from) {
                this.fetchData(to.params.id);
                this.componentKey += 1;
            }
        },
        methods: {
            fetchData(id) {
                $('#wrapper').css('opacity', '0');
                Pace.restart();
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                axios.get('/api/details/movie/' + id)
                    .then(res => this.Details = res.data)
                    .catch(err => console.log(err));
                axios.get('/api/details/movie/' + id + '/credits')
                    .then(res => this.Casts = res.data.cast)
                    .catch(err => console.log(err))
                    .then(function () {
                        jQuery('.owl-movie-casts').owlCarousel({
                            loop: true,
                            margin: 10,
                            autoplay: true,
                            autoplayTimeout: 5000,
                            autoplayHoverPause: true,
                            animateOut: 'fadeOut',
                            dots: false,
                            responsive: {
                                600: {
                                    items: 4
                                },
                                1000: {
                                    items: 6
                                }
                            }
                        });
                    });
                axios.get('/api/similar/movie/' + id)
                    .then(res => this.Similars = res.data.results)
                    .catch(err => console.log(err))
                    .then(function () {
                        jQuery('.owl-movie-similar').owlCarousel({
                            loop: true,
                            margin: 10,
                            autoplay: true,
                            autoplayTimeout: 5000,
                            autoplayHoverPause: true,
                            animateOut: 'fadeOut',
                            dots: false,
                            responsive: {
                                600: {
                                    items: 4
                                },
                                1000: {
                                    items: 6
                                }
                            }
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>
