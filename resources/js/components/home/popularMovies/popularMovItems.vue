<template>
    <div class="item">
        <div class="flip">
            <div class="front">
                <img class="d-block w-100" v-bind:src="'https://image.tmdb.org/t/p/w342'+movie.poster_path" v-bind:alt="movie.title">
            </div>
            <div class="back">
                <h3>{{movie.title}}</h3>
                <p>{{movie.overview.slice(0, 70)}}...</p>
                <router-link v-bind:to="'/details/movie/'+movie.id" class="btn btn-sm btn-secondary">Read more</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "popularMovItems",
        props: ['movie']
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
    }

    .flip:hover .front {
        opacity: 0.3;
    }

    .flip:hover .back {
        opacity: 1;
    }
</style>
