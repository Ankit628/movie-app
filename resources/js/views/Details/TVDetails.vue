<template>
    <div id="tvDetails">
        <tvDetail v-bind:details="Details" v-bind:casts="Casts"/>
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
                Casts: []
            }
        },
        mounted() {
            $('#wrapper').css('opacity', '0');
            Pace.restart();
        },
        created() {
            axios.get('/api/details/tv/' + this.id)
                .then(res => this.Details = res.data)
                .catch(err => console.log(err));
            axios.get('/api/details/tv/' + this.id + '/credits')
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
        },
    }
</script>

<style scoped>

</style>
