<template>
    <div id="FilterMovies">
        <section class="filter-header">
            <div class="container">
                <div class="row">
                    <h1 class="my-3">Your Filter Results ...</h1>
                </div>
            </div>
        </section>
        <Section class="filter-area">
            <filterBlock v-bind:filters="Filter" v-bind:pages="Pages" :key="componentKey"/>
        </Section>
        <section class="pagination-area text-center p-3 p-md-5">
            <SlidingPagination v-bind:pages="Pages" :current="1" :total="Pages" @page-change="pageChangeHandler"/>
        </section>
    </div>
</template>

<script>
    import filterBlock from "../../components/filters/movFilterBlock";
    import axios from "axios";
    import SlidingPagination from 'vue-sliding-pagination';

    export default {
        name: "FilterMovies",
        props: ['ids', 'page'],
        components: {
            filterBlock, SlidingPagination
        },
        data() {
            return {
                Filter: [],
                Pages: 1,
                componentKey: 0
            }
        },
        created() {
            this.fetchData(this.page, this.ids);
        },
        watch: {
            $route(to, from) {
                console.log(to);
                this.fetchData(to.query.page, to.query.ids);
                this.componentKey += 1;
            }
        },
        methods: {
            pageChangeHandler(change) {
                this.$router.push("/filter/movie?ids=" + this.$route.query.ids + "&page=" + change);
            },
            fetchData(page, id) {
                $('#wrapper').css('opacity', '0');
                Pace.restart();
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                axios.get('/api/discover/movie/', {
                    params: {
                        'page': page,
                        'ids': id
                    }
                })
                    .then(res => {
                        this.Pages = res.data.total_pages;
                        this.Filter = res.data.results;
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>

</style>
