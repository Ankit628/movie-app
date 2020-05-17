<template>
    <div class="page-wrapper">
        <section class="details-banner pb-2 pb-md-5">
            <div class="row bg-dark">
                <div class="col-md-12 position-relative">
                    <img class="bg-image" v-bind:src="'https://image.tmdb.org/t/p/original'+details.backdrop_path" v-bind:alt="details.name"></img>
                    <h1 class="page-title text-white">{{details.name}}</h1>
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
                                <p class="card-text">Type: {{details.type}}</p>
                                <p class="card-text">Run time: {{details.episode_run_time}} mins</p>
                                <p class="card-text">Rated Score: {{details.vote_average}} from {{details.vote_count}} votes</p>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"> Description:</h6>
                                <p class="card-text">{{details.overview}}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="card-title">Genres:</h6>
                                        <p class="card-text">
                                            <span v-for="genre in details.genres" v-bind:key="genre.id"> {{genre.name}}</span>
                                        </p>
                                        <h6 class="card-title">No. Of Episodes</h6>
                                        <p class="card-text">{{details.number_of_episodes}}</p>
                                        <h6 class="card-title">No. Of Seasons</h6>
                                        <p class="card-text">{{details.number_of_seasons}}</p>
                                        <h6 class="card-title">Language:</h6>
                                        <p class="card-text"> {{details.languages}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="card-title">First Air Date:</h6>
                                        <p class="card-text">${{details.first_air_date}}</p>
                                        <h6 class="card-title">Last Air Date:</h6>
                                        <p class="card-text">${{details.last_air_date}}</p>
                                        <h6 class="card-title">Official Site:</h6>
                                        <a v-bind:href="details.homepage">{{details.homepage}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="casts-area p-2 p-md-5 bg-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-3 text-white">Cast</h2>
                        <div class="owl-tv-casts owl-carousel owl-theme">
                            <div class="owl-carousel-item" v-bind:key="cast.id" v-for="cast in casts">
                                <div class="item">
                                    <figure class="text-center text-white">
                                        <img v-bind:src="'https://image.tmdb.org/t/p/w185'+cast.profile_path" v-bind:alt="cast.name">
                                        <figcaption>
                                            <h5>{{cast.name}}</h5>
                                            as
                                            <p>{{cast.character}}</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="similar-tv-area p-2 p-md-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-3 text-dark">Similar Movies</h2>
                        <div class="owl-tv-similar owl-carousel owl-theme">
                            <div class="owl-carousel-item" v-bind:key="similar.id" v-for="similar in similars">
                                <div class="item">
                                    <div class="flip">
                                        <div class="front">
                                            <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/h632'+similar.poster_path" v-bind:alt="similar.name">
                                        </div>
                                        <div class="back">
                                            <h5>{{similar.name}}</h5>
                                            <p class="d-none d-md-block">{{similar.overview.slice(0, 70)}}...</p>
                                            <router-link v-bind:to="{ name: 'tv-details', params: { id: similar.id } }" class="btn btn-sm btn-secondary">Read more</router-link>
                                        </div>
                                    </div>
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
        name: "tvDetails",
        props: ['details', 'casts','similars']
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

    .flip {
        position: relative;
    }

    .front {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .back {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        width: 80%;
        display: inline-block;
    }

    .flip:hover .front {
        opacity: 0.3;
    }

    .flip:hover .back {
        opacity: 1;
    }
</style>
