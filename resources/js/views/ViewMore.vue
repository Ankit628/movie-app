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
        <section class="pagination-area text-center p-3 p-md-5">
            <SlidingPagination v-bind:pages="Pages" :current="1" :total="Pages" @page-change="pageChangeHandler"/>
        </section>
    </div>
</template>

<script>
    import viewMoreComponent from "../components/viewMoreComponent";
    import axios from "axios";
    import SlidingPagination from "vue-sliding-pagination";

    export default {
        name: "viewMore",
        props: ["type", "page"],
        components: {
            viewMoreComponent, SlidingPagination
        },
        data() {
            return {
                ViewMore: [],
                Pages: 1,
                componentKey: 0
            }
        },
        created() {
            this.fetchData(this.type, this.page);
        },
        watch: {
            $route(to, from) {
                this.fetchData(to.params.type, to.params.page);
                this.componentKey += 1;
            }
        },
        methods: {
            pageChangeHandler(change) {
                this.$router.push("/more/" + this.$route.params.type + '/' + change);
            },
            fetchData(type, page) {
                $('#wrapper').css('opacity', '0');
                Pace.restart();
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                axios.get('/api/' + type + '/' + page)
                    .then(res => {
                        this.ViewMore = res.data.results;
                        this.Pages = res.data.total_pages;
                    })
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
