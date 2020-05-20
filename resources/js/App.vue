<template>
    <!-- Main Content -->
    <div id="content">
        <PageHeader v-bind:movieGenres="moviesGenres" v-bind:tvGenres="tvGenres"/>
        <router-view/>
        <PageFooter/>
    </div>
    <!-- End of Main Content -->
</template>

<script>
    import PageHeader from './components/header';
    import PageFooter from './components/footer';
    import axios from "axios";

    export default {
        name: "App",
        data() {
            return {
                moviesGenres: [],
                tvGenres: []
            }
        },
        components: {
            PageHeader, PageFooter
        },
        created() {
            axios.get('/api/genre/movie')
                .then(res => this.moviesGenres = res.data.genres)
                .catch(err => console.log(err));
            axios.get('/api/genre/tv')
                .then(res => this.tvGenres = res.data.genres)
                .catch(err => console.log(err));
        }
    }
</script>

<style scoped>

</style>
