<template>
    <div id="Home-Page">
        <section class="banner-area pb-5">
            <banner v-bind:movies="movies"></banner>
            <h2>Upcoming Movies</h2>
        </section>
        <section class="popularMovies-area p-5 bg-dark text-white">
            <popularMov v-bind:popularMovies="popularMovies"></popularMov>
        </section>
        <section class="latestMovies-area p-5">
            <latestMovie v-bind:latestMovies="latestMovies"></latestMovie>
        </section>
        <section class="popularTvShows-area p-5 bg-dark text-white">
            <popularTVShow v-bind:popularTVShows="popularTVShows"></popularTVShow>
        </section>
        <section class="airingToday-area p-5">
            <airingToday v-bind:airingToday="airingToday"></airingToday>
        </section>
    </div>
</template>

<script>
    import banner from '../components/home/banner/banner';
    import latestMovie from '../components/home/latestMovies/latestMovie';
    import popularMov from '../components/home/popularMovies/popularMov';
    import popularTVShow from '../components/home/popularTv/popularTvShows';
    import airingToday from '../components/home/airingToday/airingToday';
    import axios from 'axios';

    export default {
        name: "Home",
        components: {
            banner, latestMovie, popularMov, popularTVShow, airingToday
        },
        data() {
            return {
                movies: [],
                latestMovies: [],
                popularMovies: [],
                popularTVShows: [],
                airingToday: []
            }
        },
        created() {
            axios.get('/api/upcomingMovies')
                .then(res => this.movies = res.data.results)
                .catch(err => console.log(err))
                .then(function () {
                    jQuery('.owl-banner').owlCarousel({
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false,
                        animateOut: 'fadeOut',
                        items: 1,
                    });
                });
            axios.get('/api/popularMovies')
                .then(res => this.popularMovies = res.data.results)
                .catch(err => console.log(err))
                .then(function () {
                    jQuery('.owl-popularMov').owlCarousel({
                        loop: true,
                        margin: 20,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false,
                        animateOut: 'fadeOut',
                        responsive: {
                            0: {
                                items: 3
                            },
                            600: {
                                items: 5
                            },
                            1000: {
                                items: 7
                            }
                        }
                    });
                });
            axios.get('/api/latestMovies')
                .then(res => this.latestMovies = res.data.results)
                .catch(err => console.log(err))
                .then(function () {
                    jQuery('.owl-latestMov').owlCarousel({
                        loop: true,
                        margin: 20,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false,
                        animateOut: 'fadeOut',
                        responsive: {
                            0: {
                                items: 3
                            },
                            600: {
                                items: 5
                            },
                            1000: {
                                items: 7
                            }
                        }
                    });
                });
            axios.get('/api/popularTVShows')
                .then(res => this.popularTVShows = res.data.results)
                .catch(err => console.log(err))
                .then(function () {
                    jQuery('.owl-popularTV').owlCarousel({
                        loop: true,
                        margin: 20,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false,
                        animateOut: 'fadeOut',
                        responsive: {
                            0: {
                                items: 3
                            },
                            600: {
                                items: 5
                            },
                            1000: {
                                items: 7
                            }
                        }
                    });
                });
            axios.get('/api/airingToday')
                .then(res => this.airingToday = res.data.results)
                .catch(err => console.log(err))
                .then(function () {
                    jQuery('.owl-airingToday').owlCarousel({
                        loop: true,
                        margin: 20,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false,
                        animateOut: 'fadeOut',
                        responsive: {
                            0: {
                                items: 3
                            },
                            600: {
                                items: 5
                            },
                            1000: {
                                items: 7
                            }
                        }
                    });
                });
        }
    }
</script>

<style scoped>
    .banner-area {
        position: relative;
    }

    .banner-area h2 {
        position: absolute;
        top: 30px;
        left: 50px;
        color: #fff;
        z-index: 100;
        font-size: 40px;
    }

    @media (min-width: 992px) {
        .banner-area h2 {
            font-size: 80px;
        }
    }
</style>
