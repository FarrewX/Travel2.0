<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Popular"></head>
  <AppLayout></AppLayout>
  <div> <br> <br>
    <h2 style="text-align: center; font-size: larger;">Top 10 PopularPlaces</h2>
  </div>
  <div class="wrapper">
    <div v-for="(popular, index) in popularPlaces" :key="index">
      <div class="container">
        <input type="radio" name="slide" :id="'c' + (index)" checked>
          <label :for="'c' + (index)" class="cardpop" :style="{ backgroundImage: 'url(' + popular.image + ')' }">
            <div class="row">
                <div class="icon">{{ popular.top }}</div>
                <div class="description">
                    <h4>{{ popular.name }}</h4>
                    <p>{{ popular.location }}</p>
                </div>
            </div>
          </label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      popularPlaces: [
        {
            top: '10',
            name: 'The Forbidden City',
            location: 'Beijing',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-forbidden-city-1.png'
        },
        {
            top: '9',
            name: 'Disneyland Park',
            location: 'Anaheim',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-disneyland-anaheim.png'
        },
        {
            top: '8',
            name: 'Disneyworld’s Magic Kingdom',
            location: 'Orlando',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-world-hollywood-magical-kingdom.png'
        },
        {
            top: '7',
            name: 'Faneuil Hall Marketplace',
            location: 'Boston',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/Faneuil-Hall-Marketplace-most-visited-tourist-attraction-world.png'        },
        {
            top: '6',
            name: 'Grand Central Terminal',
            location: 'N.Y.C.',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-world-grand-central-station.png'        },
        {
            top: '5',
            name: 'Niagara Falls',
            location: 'Niagara',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-world--niagara.png'        },
        {
            top: '4',
            name: 'The Colosseum',
            location: 'Rome',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attractions-world.png'        },
        {
            top: '3',
            name: 'Central Park',
            location: 'N.Y.C.',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-central-park.png'        },
        {
            top: '2',
            name: 'Times Square',
            location: 'N.Y.C.',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-world-times-square.png'        },
        {
            top: '1',
            name: 'The Las Vegas Strip',
            location: 'Las Vegas',
            image: 'https://www.homeexchange.com/blog/content/images/2023/09/most-visited-tourist-attraction-world-las-vegas-strip.png'        }
    ]
    };
  },
};
</script>

<style>


.wrapper {
    width: 100%;
    height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    height: 400px;
    display: flex;
    flex-wrap: nowrap;
}

.cardpop {
    width: 80px;
    border-radius: .75rem;
    background-size: cover;
    cursor: pointer;
    overflow: hidden;
    border-radius: 2rem;
    margin: 0 10px;
    display: flex;
    align-items: flex-end;
    transition: .6s cubic-bezier(.28,-0.03,0,.99);
    box-shadow: 0px 10px 30px -5px rgba(0,0,0,0.8);
}

.cardpop > .row {
    color: white;
    display: flex;
    flex-wrap: nowrap;
}

.cardpop > .row > .icon {
    background: #223;
    color: white;
    border-radius: 50%;
    width: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 15px;
}

.cardpop > .row > .description {
    display: flex;
    justify-content: center;
    flex-direction: column;
    overflow: hidden;
    height: 80px;
    width: 520px;
    opacity: 0;
    transform: translateY(30px);
    transition-delay: .3s;
    transition: all .3s ease;
}

.description p {
    color: #b0b0ba;
    padding-top: 5px;
}

.description h4 {
    text-transform: uppercase;
}

input {
    display: none;
}

input:checked + label {
    width: 650px;
}

input:checked + label .description {
    opacity: 1 !important;
    transform: translateY(0) !important;
    background-color: rgba(117, 112, 112, 0.6);
    border-radius: 10%;
}
@media (max-width: 1400px) {
    .wrapper{
        width: 100%;
        display: block;
        grid-template-columns: auto;
        grid-template-rows: auto;
    }
}
@media (max-width: 950px) {
    .wrapper{
        width: 100%;
        display: block;
        grid-template-columns: auto;
        grid-template-rows: auto;

    }
}

@media (max-width: 600px) {
    .wrapper{
        width: 100%;
        display: block;
        grid-template-columns: auto;
        grid-template-rows: auto;
    }
}
</style>