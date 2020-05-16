<template>
    <div class="item">
        <div class="flip">
            <div class="front">
                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+tv.poster_path" v-bind:alt="tv.name">
            </div>
            <div class="back">
                <h3>{{tv.name}}</h3>
                <p class="d-none d-md-block">{{tv.overview.slice(0, 70)}}...</p>
                <router-link v-bind:to="{ name: 'tv-details', params: { id: tv.id } }" class="btn btn-sm btn-secondary">Read more</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "popularTVShowsItems",
        props: ['tv']
    }
</script>
<style scoped>
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
        font-size: 1rem;
    }

    .back h3 {
        font-size: 1rem;
    }

    .flip:hover .front {
        opacity: 0.3;
    }

    .flip:hover .back {
        opacity: 1;
    }

    @media (min-width: 992px) {
        .back {
            font-size: 1.5rem;
        }
        .back h3 {
            font-size: 1.75rem;
        }
    }
</style>
