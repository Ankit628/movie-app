<template>
    <div id="search">
        <section class="search-header">
            <div class="container">
                <div class="row">
                    <h1 class="my-3">Your Search Results ...</h1>
                </div>
            </div>
        </section>
        <Section class="search-area">
            <searchBlock v-bind:searches="Searches" :key="componentKey"/>
        </Section>
        <section class="pagination-area text-center p-3 p-md-5">
            <SlidingPagination v-bind:pages="Pages" :current="1" :total="Pages" @page-change="pageChangeHandler"/>
        </section>
    </div>
</template>

<script>
    import searchBlock from "../components/search/searchBlock";
    import axios from "axios";
    import SlidingPagination from 'vue-sliding-pagination';

    export default {
        name: "Search",
        props: ["search", "page"],
        components: {
            searchBlock, SlidingPagination
        },
        data() {
            return {
                Searches: [],
                Pages: 1,
                componentKey: 0
            }
        },
        created() {
            this.fetchData(this.search, this.page);
        },
        watch: {
            $route(to, from) {
                this.fetchData(to.params.search, to.params.page);
                this.componentKey += 1;
            }
        },
        methods: {
            pageChangeHandler(change) {
                this.$router.push("/search/" + this.$route.params.search + '/' + change);
            },
            fetchData(search, page) {
                $('#wrapper').css('opacity', '0');
                Pace.restart();
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                axios.get('/api/search/' + search + '/' + page)
                    .then(res => {
                        this.Pages = res.data.total_pages;
                        this.Searches = res.data.results;
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>

</style>
