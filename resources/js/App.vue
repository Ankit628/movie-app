<template>
    <!-- Main Content -->
    <div id="content">
        <PageHeader/>
        <router-view/>
        <PageFooter/>
    </div>
    <!-- End of Main Content -->
</template>

<script>
    import PageHeader from './components/header';
    import PageFooter from './components/footer';

    export default {
        name: "App",
        components: {
            PageHeader, PageFooter
        }
    }
</script>

<style scoped>

</style>
