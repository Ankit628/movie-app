<template>
    <div id="tvDetails">
        <tvDetail v-bind:details="Details" v-bind:casts="Casts" v-bind:similars="Similars" :key="componentKey"/>
    </div>
</template>

<script>
    import axios from 'axios';
    import tvDetail from '../../components/details/TV/tvDetails'

    export default {
        name: "tvDetails",
        props: ['id'],
        components: {
            tvDetail
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
                axios.get('/api/details/tv/' + id)
                    .then(res => this.Details = res.data)
                    .catch(err => console.log(err));
                axios.get('/api/details/tv/' + id + '/credits')
                    .then(res => this.Casts = res.data.cast)
                    .catch(err => console.log(err))
                    .then(function () {
                        jQuery('.owl-tv-casts').owlCarousel({
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
                axios.get('/api/similar/tv/' + id)
                    .then(res => this.Similars = res.data.results)
                    .catch(err => console.log(err))
                    .then(function () {
                        jQuery('.owl-tv-similar').owlCarousel({
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
            }
        }
    }
</script>

<style scoped>

</style>
