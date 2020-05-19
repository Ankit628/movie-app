<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Airing Today</h2>
                <div class="owl-airingToday owl-carousel owl-theme">
                    <div class="owl-carousel-item" v-bind:key="airing.id" v-for="airing in airingToday">
                        <airingTodayItem v-bind:tv="airing"/>
                    </div>
                </div>
                <router-link v-bind:to="{ name:'more', params:{type:'airingToday',page:1} }" class="btn btn-lg btn-link float-right text-success">View More...</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import airingTodayItem from "../airingToday/airingTodayItem";

    export default {
        name: "airingToday",
        props: ['airingToday'],
        components: {
            airingTodayItem
        }
    }
</script>

<style scoped>

</style>
