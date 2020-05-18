<template>
    <header class="sticky-top bg-dark">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-md-8">
                    <h2 class="text-left h1">
                        <router-link to="/" class="text-success text-decoration-none">
                            The Movies App
                        </router-link>
                    </h2>
                </div>
                <div class="col-md-4 text-right">
                    <div class="form my-auto">
                        <form @submit="submitForm">
                            <div class="form-row">
                                <div class="col-sm-10">
                                    <label for="search_params" class="col-form-label w-100 py-0">
                                        <input type="text" class="form-control" v-model="search_params" id="search_params" name="search_params" placeholder=" Search...">
                                    </label>
                                </div>
                                <div class="col-sm-2 d-none d-sm-block">
                                    <input type="submit" value="Search" class="btn btn-outline-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

</template>

<script>
    export default {
        name: "PageHeader",
        data() {
            return {
                search_params: null,
            }
        },
        methods: {
            submitForm(e) {
                e.preventDefault();
                this.$router.push("/search/" + this.search_params);
            }
        }
    }
</script>

<style scoped>

</style>
