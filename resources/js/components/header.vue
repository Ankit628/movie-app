<template>
    <header class="sticky-top bg-dark">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-md-8">
                    <nav class="navbar navbar-dark bg-dark p-0 mb-2">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <h2 class="text-left pl-2 pl-sm-5 m-0">
                            <router-link to="/" class="text-success text-decoration-none">
                                The Movies App
                            </router-link>
                        </h2>
                    </nav>
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
                <div class="col-md-12">
                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class="bg-dark mt-2">
                            <h5 class="text-success text-center">
                                Filter via Genres
                            </h5>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-success" id="nav-movies-tab" href="#nav-movies" data-toggle="tab" role="tab" aria-controls="nav-movies" aria-selected="true"">Movies</a>
                                <a class="nav-item nav-link text-success" id="nav-tvShows-tab" href="#nav-tvShows" data-toggle="tab" role="tab" aria-controls="nav-tvShows" aria-selected="false"">TV Shows</a>
                            </div>
                            <div class="tab-content text-white" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-movies" role="tabpanel" aria-labelledby="nav-movies-tab">
                                    <div class="row mx-auto my-1 text-success">
                                        <div class="col-4 col-md-3" v-for="movieGenre in movieGenres" v-bind:key="movieGenre.id">
                                            <h6>{{movieGenre.name}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-tvShows" role="tabpanel" aria-labelledby="nav-tvShows-tab">
                                    <div class="row mx-auto my-1 text-success">
                                        <div class="col-4 col-md-3" v-for="tvGenre in tvGenres" v-bind:key="tvGenre.id">
                                            <h6>{{tvGenre.name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</template>

<script>
    export default {
        name: "PageHeader",
        props: ['movieGenres', 'tvGenres'],
        data() {
            return {
                search_params: null,
                page: 1
            }
        },
        methods: {
            submitForm(e) {
                e.preventDefault();
                $('#search_params').blur();
                this.$router.push("/search/" + this.search_params + '/' + this.page);
            }
        }
    }
</script>

<style scoped>
    .navbar {
        justify-content: flex-start;
    }

    h2 {
        font-size: 1.8rem;
    }

    h6 {
        font-size: 1rem;
    }

    .navbar-toggler {
        font-size: 1rem;
    }

    @media (min-width: 512px) {
        h2 {
            font-size: 2rem;
        }

        .navbar-toggler {
            font-size: 1.2rem;
        }
    }

    @media (min-width: 992px) {
        h2 {
            font-size: 2.4rem;
        }

        h6 {
            font-size: 1.2rem;
        }

        .navbar-toggler {
            font-size: 1.5rem;
        }
    }

</style>
