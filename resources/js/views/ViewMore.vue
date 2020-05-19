<template>
    <div id="viewMore-page">
        <section class="viewMore-header bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 py-2 py-md-4 text-white">
                        <h1 class="text-capitalize text-center" v-if="type==='popularTvShows'">Popular Tv Shows</h1>
                        <h1 class="text-capitalize text-center" v-if="type==='popularMovies'">Popular Movies</h1>
                        <h1 class="text-capitalize text-center" v-if="type==='latestMovies'">Latest Tv Shows</h1>
                        <h1 class="text-capitalize text-center" v-if="type==='airingToday'">Airing Today</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="viewMore-area">
            <viewMoreComponent :key="componentKey" v-bind:viewMore="ViewMore" v-bind:type="type"/>
        </section>
    </div>
</template>

<script>
    import viewMoreComponent from "../components/viewMoreComponent";
    import axios from "axios";

    export default {
        name: "viewMore",
        props: ["type"],
        components: {
            viewMoreComponent
        },
        data() {
            return {
                ViewMore: [],
                componentKey: 0
            }
        },
        created() {
            this.fetchData(this.type);
        },
        watch: {
            $route(to, from) {
                this.fetchData(to.params.type);
                this.componentKey += 1;
            }
        },
        methods: {
            fetchData(type) {
                $('#wrapper').css('opacity', '0');
                Pace.restart();
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                axios.get('/api/' + type)
                    .then(res => this.ViewMore = res.data.results)
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>
    @media (min-width: 768px) {
        h1 {
            font-size: 80px;
        }
    }
</style>
