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
    </div>
</template>

<script>
    import searchBlock from "../components/search/searchBlock";
    import axios from "axios";

    export default {
        name: "Search",
        props: ["search"],
        components: {
            searchBlock
        },
        data() {
            return {
                Searches: [],
                componentKey: 0
            }
        },
        created() {
            this.fetchData(this.search);
        },
        watch: {
            $route(to, from) {
                this.fetchData(to.params.search);
                this.componentKey += 1;
            }
        },
        methods: {
            fetchData(search) {
                $('#wrapper').css('opacity', '0');
                Pace.restart();
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                axios.get('/api/search/' + search)
                    .then(res => this.Searches = res.data.results)
                    .catch(err => console.log(err));
            }
        }
    }
</script>

<style scoped>

</style>
