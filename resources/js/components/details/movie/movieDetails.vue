<template>
    <div class="page-wrapper">
        <section class="details-banner pb-2 pb-md-5">
            <div class="row bg-dark">
                <div class="col-md-12 position-relative">
                    <img class="bg-image" v-bind:src="'https://image.tmdb.org/t/p/original'+details.backdrop_path" v-bind:alt="details.original_title"></img>
                    <div class="page-title">
                        <h1 class="text-white">
                            {{details.original_title}}
                        </h1>
                        <h4 class="text-white">{{details.tagline}}</h4>
                    </div>
                </div>
            </div>
        </section>
        <section class="details-content p-2 p-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-none d-md-block">
                        <figure class="text-center">
                            <img v-bind:src="'https://image.tmdb.org/t/p/w500'+details.poster_path" v-bind:alt="details.original_title">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <h5 class="card-title">Release Date: {{details.release_date}}</h5>
                                <p class="card-text">status: {{details.status}}</p>
                                <p class="card-text">Run time: {{details.runtime}} mins</p>
                                <p class="card-text">Rated Score: {{details.vote_average}} from {{details.vote_count}} votes</p>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"> Description:</h6>
                                <p class="card-text">{{details.overview}}</p>
                                <h6 class="card-title">Genres:</h6>
                                <p class="card-text">
                                    <span v-for="genre in details.genres" v-bind:key="genre.id"> {{genre.name}}</span>
                                </p>
                                <h6 class="card-title">Language:</h6>
                                <p class="card-text">
                                    <span v-for="language in details.spoken_languages" v-bind:key="language.iso_639_1"> {{language.name}}</span>
                                </p>
                                <h6 class="card-title">Budget:</h6>
                                <p class="card-text">${{details.budget}}</p>
                                <h6 class="card-title">Revenue:</h6>
                                <p class="card-text">${{details.revenue}}</p>
                                <h6 class="card-title">Official Site:</h6>
                                <a v-bind:href="details.homepage">{{details.homepage}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="casts-area p-2 p-md-5 bg-dark">
            <div class="continer-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-3 text-white">Cast</h2>
                        <div class="owl-movie-casts owl-carousel owl-theme">
                            <div class="owl-carousel-item" v-bind:key="cast.id" v-for="cast in casts">
                                <div class="item">
                                    <figure class="text-center text-white">
                                        <img v-bind:src="'https://image.tmdb.org/t/p/w185'+cast.profile_path" v-bind:alt="cast.name">
                                        <figcaption>
                                            <h6>{{cast.name}}</h6>
                                            as
                                            <h5>{{cast.character}}</h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "movieDetails",
        props: ['details', 'casts']
    }
</script>

<style scoped>
    .page-title {
        position: absolute;
        display: inline-block;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        text-align: center;
    }

    @media (min-width: 992px) {
        h1 {
            font-size: 80px;
        }
    }

    .bg-image {
        opacity: 0.5;
        max-width: 100%;
        width: 100%;
    }
</style>
